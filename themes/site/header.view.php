<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php SEO::generate(); ?>
    <link rel="stylesheet" href="<?php Asset("bootstrap/css/bootstrap-reboot.min.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("bootstrap/css/bootstrap-grid.min.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("common/css/normalize.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("common/css/base.css"); ?>">
    <link rel="stylesheet" href="<?php Asset("theme/site/site.css"); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.js" integrity="sha512-P3/SDm/poyPMRBbZ4chns8St8nky2t8aeG09fRjunEaKMNEDKjK3BuAstmLKqM7f6L1j0JBYcIRL4h2G6K6Lew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        Turbolinks.start();
    </script>
    <script type="text/javascript" src="<?php Asset("common/js/base.js"); ?>"></script>
    <script type="text/javascript" src="<?php echo Asset("theme/site/site.js"); ?>"></script>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="container-xxl container-xl container-md container">

                <div class="header__profile">
                    <div class="header__profile--hotline">Hotline : <span style="font-weight: 700;">19001919</span></div>

                    <div class="header__profile--account">
                        <?php if (auth()->checkAuth()) {
                        ?> Chào <span style="font-weight: 700;"> <?php echo auth()->getAuth()->user_name; ?></span>,
                            <a href="<?php BaseUrl('dang-xuat'); ?>" title="Đăng xuất">Đăng xuất</a>
                        <?php
                        } else {
                        ?>
                            <a href="<?php BaseUrl(URL_LOGIN); ?>" title="Đăng nhập">Đăng nhập</a>
                            <a href="<?php BaseUrl(URL_REGISTER); ?>" title="Đăng ký tài khoản">Đăng ký</a>
                        <?php
                        }
                        ?>
                    </div>

                </div>
                <div class="header__search-cart">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <a href="<?php BaseUrl(); ?>">
                                <img class="header__search-cart--logo" src="<?php Asset("images/logo.png") ?>" />
                            </a>
                        </div>
                        <div class="col-10 col-md-9">
                            <div class="header__search-cart--search-main">
                                <form role="search" class="shopee-searchbar-input" autocomplete="off"><input aria-label="ÁO THỂ THAO TỪ 88k" maxlength="128" placeholder="ÁO THỂ THAO TỪ 88k" autocomplete="off" value=""></form>
                                <button type="button" class="btn btn-solid-primary btn--s btn--inline"><svg height="19" viewBox="0 0 19 19" width="19" class="shopee-svg-icon ">
                                        <g fill-rule="evenodd" stroke="none" stroke-width="1">
                                            <g transform="translate(-1016 -32)">
                                                <g>
                                                    <g transform="translate(405 21)">
                                                        <g transform="translate(611 11)">
                                                            <path d="m8 16c4.418278 0 8-3.581722 8-8s-3.581722-8-8-8-8 3.581722-8 8 3.581722 8 8 8zm0-2c-3.3137085 0-6-2.6862915-6-6s2.6862915-6 6-6 6 2.6862915 6 6-2.6862915 6-6 6z"></path>
                                                            <path d="m12.2972351 13.7114222 4.9799555 4.919354c.3929077.3881263 1.0260608.3842503 1.4141871-.0086574.3881263-.3929076.3842503-1.0260607-.0086574-1.414187l-4.9799554-4.919354c-.3929077-.3881263-1.0260608-.3842503-1.4141871.0086573-.3881263.3929077-.3842503 1.0260608.0086573 1.4141871z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                                <div class="header__search-cart--suggest-box">
                                    Gợi ý: từ khóa.
                                </div>
                            </div>
                        </div>
                        <div class="col-2 col-md-1">
                            <div class="header__search-cart--cart">
                                <svg viewBox="0 0 26.6 25.6" class="icon-shopping-cart">
                                    <polyline fill="none" points="2 1.7 5.5 1.7 9.6 18.3 21.2 18.3 24.6 6.1 7 6.1" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2.5"></polyline>
                                    <circle cx="10.7" cy="23" r="2.2" stroke="none"></circle>
                                    <circle cx="19.7" cy="23" r="2.2" stroke="none"></circle>
                                </svg>
                                <div class="header__search-cart--cart-box">
                                    Giỏ hàng
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="header_suggest">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-sm-12 col-md-10">
                            <a href="<?php BaseUrl("san-pham/ao-cau-long-yonex"); ?>">Áo cầu lông Yonex Y1718</a>
                            <a href="<?php BaseUrl("san-pham/ao-cau-long-yonex"); ?>">Áo cầu lông Yonex Y1718</a>
                            <a href="<?php BaseUrl("san-pham/ao-cau-long-yonex"); ?>">Áo cầu lông Yonex Y1718</a>
                            <a href="<?php BaseUrl("san-pham/ao-cau-long-yonex"); ?>">Áo cầu lông Yonex Y1718</a>
                            <a href="<?php BaseUrl("san-pham/ao-cau-long-yonex"); ?>">Áo cầu lông Yonex Y1718</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">