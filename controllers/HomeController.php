<?php
class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // load model user
        app()->loadModel('user');
        app()->loadModel('product');
    }
    public function getIndex()
    {
        $data = ProductModel::New()->getAll();
        app()->loadTheme('header');
        View('site.home', ['data' => $data]);
        app()->loadTheme('footer');
    }
    public function getProductDetail($slug)
    {
        $arrs = explode('.',$slug);
        $id=$arrs[count($arrs)-1];
        $item = ProductModel::Find($id);
        SEO::Title($item->name);
        app()->loadTheme('header');
        View('site.product-detail',['item'=>$item]);
        app()->loadTheme('footer');
    }
    public function getProductCatalog($slug)
    {
        SEO::Title("Loại áo cầu lông");
        app()->loadTheme('header');
        View('site.product-catalog');
        app()->loadTheme('footer');
    }
}
