<?php
$router->get('/', 'Home@getIndex');
$router->get('san-pham/{slug}', 'Home@getProductDetail');
$router->get('nhom-san-pham/{slug}', 'Home@getProductCatalog');
$router->get(URL_LOGIN, 'Auth@getLogin');
$router->post(URL_LOGIN, 'Auth@postLogin');
$router->get(URL_REGISTER, 'Auth@getRegister');
$router->post(URL_REGISTER, 'Auth@postRegister');
$router->get('dang-xuat', function () {
    session_destroy();
    app()->GoToUrl(URL_BASE);
});
/*


//
$table->AddColumn('price', 'int NOT NULL');
$table->AddColumn('price_min', 'int NOT NULL');
$table->AddColumn('', 'int NOT NULL');

$table->AddColumn('', 'int  NULL');
$table->AddColumn('', 'int  NULL');
$table->AddColumn('', 'int  NULL');*/

$router->get('test-api', function () {
    app()->loadModel('product');
    app()->loadModel('catalog');
    app()->loadHelper('callApi');
    $data = json_decode(callAPI('get', 'https://shopee.vn/api/v4/recommend/recommend?bundle=daily_discover_campaign&item_card=3&label=1005922&limit=60&offset=0', false));
    ProductModel::New()->TRUNCATE();
    foreach ($data->data->sections[0]->data->item as $item) {
        $product = new ProductModel();
        $product->sku_code = "code";
        $product->slug = TextUtil::sanitize($item->name);
        $product->tier_variations = json_encode($item->tier_variations);
        $product->name = $item->name;
        $product->image = $item->image;
        $product->images = json_encode($item->images);
        $product->link_ref = "https://shopee.vn/product/{$item->shopid}/{$item->itemid}";
        $product->raw_discount = $item->raw_discount;
        $product->discount = $item->discount;

        $product->discount_unit = 0;
        $product->brand = $item->brand;
        $product->price = $item->price;
        $product->price_min = $item->price_min;
        $product->price_max = $item->price_max;
        $product->price_before_discount = $item->price_before_discount;
        $product->price_min_before_discount = $item->price_min_before_discount;
        $product->price_max_before_discount = $item->price_max_before_discount;
        $product->Insert();
        echo "<a href='https://shopee.vn/product/{$item->shopid}/{$item->itemid}'><img src='https://cf.shopee.vn/file/{$item->image}'/>{$item->name}</a>";
    }
});
