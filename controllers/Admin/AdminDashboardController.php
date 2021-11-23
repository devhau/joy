<?php
class AdminDashboardController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getIndex()
    {
        SEO::Title("Quản trị website");
        app()->loadTheme('header');
        View('admin.dashboard.index');
        app()->loadTheme('footer');
    }
}
