<?php

class Application
{
    private static $app;
    public static function Run()
    {
        if (session_id() === '')
            session_start();
        if (!isset(Application::$app)) {
            Application::$app = new Application();
        }
    }
    public static function Inst(): Application
    {
        return Application::$app;
    }
    //variable
    private $data = [];
    private $error = [];
    private $database;
    public $router;
    public function getDatabase()
    {
        if (!isset($this->database)) {
            $this->database = new Database(DB_HOST, DB_USER, DB_PASS, DB_DATABASE, DB_DATABASE);
        }
        return $this->database;
    }
    public function __construct()
    {
        $this->loadVendor('controller');
        $this->loadVendor('router');
        $this->loadVendor('model');
        $this->loadVendor('auth');
        $this->router = new Router();
    }
    public function Start()
    {
        $router = $this->router;
        app()->setTheme(THEME_SITE);
        require_once(PATH_ROUTER . '/web.router.php');
        $router->mount(URL_ADMIN, function () use ($router) {
            require_once(PATH_ROUTER . '/admin.router.php');
        });
        $router->run();
    }
    public function clearError()
    {
        $this->error = [];
    }
    public function getErrors()
    {
        return $this->error;
    }
    public function addError($key, $error)
    {
        $this->error += [$key => $error];
    }
    public function showErrors()
    {
        if (isset($this->error) && count($this->error) > 0) {
            echo "<ul>";
            foreach ($this->error as $key => $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ul>";
        }
    }
    public function gettCurrentUrl()
    {
        return $this->router->getCurrentUri();
    }
    public function gettUrl($url)
    {
        return URL_BASE . $url;
    }
    public function getSession($key)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
    }
    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
    }
    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
    public function PostData()
    {
        return $_POST;
    }

    public function GetData()
    {
        return $_GET;
    }
    public function GoToUrl($url)
    {
        header("Location: {$url}", TRUE, 301);
        die();
        exit();
    }
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }
    public function loadTheme($view, $variables = null, $isContent = false)
    {
        if ($isContent) return Content(PATH_THEME . $this->theme . '/' . str_replace('.', '/', $view) . '.view.php', $variables);
        if (isset($variables)) {
            foreach ($variables as $key => $value) {
                ${$key} = $value;
            }
        }
        include(PATH_THEME . $this->theme . '/' . str_replace('.', '/', $view) . '.view.php');
    }
    public function loadModel($model)
    {
        require_once(PATH_MODEL . $model . '.model.php');
    }
    public function loadHelper($helper)
    {
        require_once(PATH_HELPER . $helper . '.helper.php');
    }
    public function loadVendor($vendor)
    {
        require_once(PATH_VENDOR . $vendor . '.vendor.php');
    }
    public function loadComponent($component)
    {
        $components = explode('.', $component);
        $componentName = $components[count($components) - 1];
        $components = join('/', $components);
        if (file_exists(PATH_COMPONENT . $components . '/' . $componentName . '.component.php')) {
            require_once(PATH_COMPONENT . $components . '/' . $componentName . '.component.php');
            return $componentName;
        }
        require_once(PATH_COMPONENT . $components . '.component.php');
        return $componentName;
    }
    public function __get($name)
    {
        return $this->data[$name];
    }
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}
Application::Run();
function app(): Application
{
    return Application::Inst();
}
function router(): Router
{
    return Application::Inst()->router;
}
function BComponent($component, $variables = null)
{
    app()->loadVendor('component');
    $component =  app()->loadComponent($component);

    (new ($component . 'Component'))->Run($variables);
}
function View($view, $variables = null, $isContent = false)
{
    if ($isContent) return Content(PATH_VIEW . str_replace('.', '/', $view) . '.view.php', $variables);
    if (isset($variables)) {
        foreach ($variables as $key => $value) {
            ${$key} = $value;
        }
    }
    include(PATH_VIEW . str_replace('.', '/', $view) . '.view.php');
}
function BaseUrl($url = "", $rs = false)
{
    if ($rs) return URL_BASE . $url;
    echo  URL_BASE . $url;
}

function Asset($asset, $rs = false)
{
    return BaseUrl('assets/' . $asset, $rs);
}

function Content($file, $variables = null)
{
    if (isset($variables)) {
        foreach ($variables as $key => $value) {
            ${$key} = $value;
        }
    }
    ob_start();
    require($file);
    return ob_get_clean();
}
class TextUtil {
    public static function sanitize($title) {
        $replacement = '-';
        $map = array();
        $quotedReplacement = preg_quote($replacement, '/');
        $default = array(
            '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
            '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
            '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
            '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
            '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
            '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/' => 'y',
            '/đ|Đ/' => 'd',
            '/ç/' => 'c',
            '/ñ/' => 'n',
            '/ä|æ/' => 'ae',
            '/ö/' => 'oe',
            '/ü/' => 'ue',
            '/Ä/' => 'Ae',
            '/Ü/' => 'Ue',
            '/Ö/' => 'Oe',
            '/ß/' => 'ss',
            '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
            '/\\s+/' => $replacement,
            sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
        );
        //Some URL was encode, decode first
        $title = urldecode($title);
        $map = array_merge($map, $default);
        return strtolower(preg_replace(array_keys($map), array_values($map), $title));
    }
}