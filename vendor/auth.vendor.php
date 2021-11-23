<?php

class Auth
{
    public function __construct()
    {
        app()->loadModel('user');
        app()->loadModel('role');
    }
    private static $app;
    public static function Inst(): Auth
    {
        if (!isset(Auth::$app) || Auth::$app == null) Auth::$app = new Auth();
        return Auth::$app;
    }
    private $keyAuth = 'DF46CB43-CE75-40F7-BAE7-BF4A8CE0FAEB';
    private $user;
    public function checkUserAuth($data = null)
    {
        if ($data == null) $data = app()->PostData();
        if (isset($data['user_name']) && isset($data['password'])) {
            $user = (new UserModel)->FindByUserNameOrEmail($data['user_name']);
            if ($user && VerifyPassword($data['password'], $user->password)) {
                $user->password = "";
                $this->cetAuth($user->getData());
                return true;
            }
        }
        return false;
    }
    public function RegisterAuth($data = null)
    {
        if ($data == null) $data = app()->PostData();
        $user = new UserModel;
        if (!isset($data['email']) || $user->CheckEmail($data['email'])) {
            app()->addError('email', "Email đã được dùng hoặc rỗng");
            return false;
        }
        if (!$data['user_name'] || $user->CheckUsername($data['user_name'])) {
            app()->addError('user_name', "Tài khoản đã được dùng hoặc rỗng");
            return false;
        }
        $user->user_name = $data['user_name'];
        $user->password = HashPassword($data['password']);
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        $user->Save();
        $user->password = null;
        $this->cetAuth($user->getData());
        return true;
    }
    public function checkAuth()
    {
        return app()->getSession($this->keyAuth) != null;
    }
    public function checkRoles()
    {
        $roles = func_get_args();
    }

    public function cetAuth($auth)
    {
        app()->setSession($this->keyAuth, $auth);
    }
    public function getAuth()
    {
        if (!isset($this->user)) {
            $data = app()->getSession($this->keyAuth);
            $this->user = (new UserModel)->ConvertToObject($data);
        }
        return $this->user;
    }
}

function auth(): Auth
{
    return Auth::Inst();
}
function HashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}
function VerifyPassword($password, $hash)
{
    return password_verify($password, $hash);
}
