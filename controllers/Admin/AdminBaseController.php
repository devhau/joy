<?php
class AdminBaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!auth()->checkAuth()){
            app()->GoToUrl(BaseUrl(URL_LOGIN,true));
        }
        app()->setTheme(THEME_ADMIN);
    }
}
