<?php
class AdminProductController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
        app()->loadModel('product');
    }
    public function getIndex()
    {
        $data = ProductModel::New()->getAll();
        SEO::Title("Quản lý sản phẩm");
        app()->loadTheme('header');
        View('admin.product.index', ['data' => $data]);
        app()->loadTheme('footer');
    }
    public function getEdit($id)
    {
        $data = ProductModel::Find($id);
        SEO::Title("Cập nhật tài khoản");
        app()->loadTheme('header');
        View('admin.product.edit', ['data' => $data]);
        app()->loadTheme('footer');
    }
    public function postEdit($id)
    {
        $data = ProductModel::Find($id);
        $data->Fill(app()->PostData());
        $data->Update();
        app()->GoToUrl(BaseUrl(URL_ADMIN . '/product', true));
        SEO::Title("Cập nhật tài khoản");
        app()->loadTheme('header');
        View('admin.product.edit', ['data' => $data]);
        app()->loadTheme('footer');
    }
    public function getAdd()
    {
        SEO::Title("Thêm mới tài khoản");
        app()->loadTheme('header');
        View('admin.product.add');
        app()->loadTheme('footer');
    }
    public function postAdd()
    {
        $data = ProductModel::New();
        $data->Fill(app()->PostData());
        $data->password = HashPassword($data->password);
        $data->Insert();
        app()->GoToUrl(BaseUrl(URL_ADMIN . '/product', true));
        SEO::Title("Thêm mới tài khoản");
        app()->loadTheme('header');
        View('admin.product.add');
        app()->loadTheme('footer');
    }
    public function getDelete($id)
    {
        $data = ProductModel::Find($id);
        $data->delete();
        app()->GoToUrl(BaseUrl(URL_ADMIN . '/product', true));
    }
}
