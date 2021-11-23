<?php

class Component
{
    private $data;
    private $propertyLock = ['componentId', 'componentName', 'componentPath', 'self'];
    public function __construct($id)
    {
        if (!$id)  $id = uniqid();
        $this->data = [];
        $this->data['componentId'] = $id;
        $this->data['componentName'] = str_replace("Component", "", get_class($this));
        $this->data['componentPath'] = $this->getPathComponent();
        $this->data['self'] = $this;
    }
    private function callMount($variables = null)
    {
        if ($variables && method_exists($this, 'Mount')) {
            $ref = new ReflectionMethod($this, 'Mount');
            $_args = array();
            foreach ($ref->getParameters() as $arg) {
                if (isset($variables[$arg->name]))
                    $_args[$arg->name] = $variables[$arg->name];
                else
                    $_args[$arg->name] = null;
            }
            call_user_func_array(array($this, 'Mount'),  $_args);
        }
    }
    public function Run($variables = null)
    {
        $this->callMount($variables);
        $content = $this->Render();
        $content =   preg_replace('/(<*\b[^><]*)>/i', '$1 bc:id=\'' . $this->componentId . '\' bc:data=\'' . json_encode($this->data) . '\'>', $content, 1);
        echo  $content;
    }
    public function RunAjax($variables = null)
    {
        $this->callMount($variables);
        $content = $this->Render();
        $content =   preg_replace('/(<*\b[^><]*)>/i', '$1 bc:id=\'' . $this->componentId . '\' bc:data=\'' . json_encode($this->data) . '\'>', $content, 1);

        $repos = [];
        $repos['html'] = $content;
        $repos['data'] = $this->data;
        $repos['hash'] =  uniqid();
        print_r($repos);
        die();
    }
    public function Render(): string
    {
        return "<div class='bg-red'>hello</div>";
    }
    public function __get($name)
    {
        return $this->data[$name];
    }
    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->propertyLock))
            throw new Exception("Your variable don't use name :" . $name);
        $this->data[$name] = $value;
    }
    protected function getDir()
    {
        $rc = new ReflectionClass(get_class($this));
        return dirname($rc->getFileName());
    }
    private function getPathComponent()
    {
        if (!isset($this->data['componentPath'])) {
            $path = $this->getDir();
            $path = str_replace("\\", "/", $path);
            $path = str_replace(str_replace("\\", "/", PATH_COMPONENT), "", $path);
            $path = str_replace("/", ".", $path);
            $this->data['componentPath'] = $path;
        }
        return  $this->data['componentPath'];
    }
    public function View($view = null)
    {
        return Content($this->getDir() . '/' . $this->componentName . '.view.php', $this->data);
    }
}
