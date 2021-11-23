<?php
class AdminUserController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getIndex()
    {
        $data = UserModel::New()->getAll();
        SEO::Title("Quản lý tài khoản");
        app()->loadTheme('header');
        View('admin.user.index', ['data' => $data]);
        app()->loadTheme('footer');
    }
    public function getEdit($id)
    {
        $data = UserModel::Find($id);
        SEO::Title("Cập nhật tài khoản");
        app()->loadTheme('header');
        View('admin.user.edit', ['data' => $data]);
        app()->loadTheme('footer');
    }
    public function postEdit($id)
    {
        $data = UserModel::Find($id);
        $data->Fill(app()->PostData());
        $data->Update();
        app()->GoToUrl(BaseUrl(URL_ADMIN . '/user', true));
        SEO::Title("Cập nhật tài khoản");
        app()->loadTheme('header');
        View('admin.user.edit', ['data' => $data]);
        app()->loadTheme('footer');
    }
    public function getAdd()
    {
        SEO::Title("Thêm mới tài khoản");
        app()->loadTheme('header');
        View('admin.user.add');
        app()->loadTheme('footer');
    }
    public function postAdd()
    {
        $data = UserModel::New();
        $data->Fill(app()->PostData());
        $data->password = HashPassword($data->password);
        $data->Insert();
        app()->GoToUrl(BaseUrl(URL_ADMIN . '/user', true));
        SEO::Title("Thêm mới tài khoản");
        app()->loadTheme('header');
        View('admin.user.add');
        app()->loadTheme('footer');
    }
    public function getDelete($id)
    {
        $data = UserModel::Find($id);
        $data->delete();
        app()->GoToUrl(BaseUrl(URL_ADMIN . '/user', true));
    }
}
