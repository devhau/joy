<?php
class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getLogin()
    {
        SEO::Title("Đăng nhập hệ thống");
        app()->loadTheme('header');
        View('auth.login');
        app()->loadTheme('footer');
    }
    public function postLogin()
    {
        if (auth()->checkUserAuth()) {
            app()->GoToUrl(BaseUrl('', true));
        }
        app()->loadTheme('header');
        View('auth.login');
        app()->loadTheme('footer');
    }
    public function getRegister()
    {
        SEO::Title("Đăng ký tài khoản");
        app()->loadTheme('header');
        View('auth.register');
        app()->loadTheme('footer');
    }
    public function postRegister()
    {
        if (auth()->RegisterAuth()) {
            app()->GoToUrl(BaseUrl('', true));
        }
        SEO::Title("Đăng ký tài khoản");
        app()->loadTheme('header');
        View('auth.register');
        app()->loadTheme('footer');
    }
}
