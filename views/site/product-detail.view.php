<div class="container-xxl container-xl container-md container p-2 h-100">
    <div class="row">
        <div class="col-md-9 col-12">
            <div class="product-detail">
                <div class="row">
                    <div class="col-md-5 col-12">
                        <div class="product-detail__image">
                            <div class="product-detail__image--main">
                                <img src="https://cf.shopee.vn/file/<?php echo $item->image; ?>" />
                            </div>
                            <div class="product-detail__image--list">
                                <?php
                                foreach (json_decode($item->images) as $image) {
                                    echo "<img src='https://cf.shopee.vn/file/{$image}' />";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="product-detail__info">
                            <h1><a href="<?php BaseUrl("san-pham/" . $item->slug . "." . $item->id); ?>" title="<?php echo $item->name; ?>">
                                    <?php echo $item->name; ?>
                                </a></h1>
                            <div class="product-detail__info--rate ">
                                <div class="rate">
                                    5.0 |
                                    <span class="rate-active">☆</span>
                                    <span class="rate-active">☆</span>
                                    <span class="rate-active">☆</span>
                                    <span class="rate-active">☆</span>
                                    <span class="rate-active">☆</span>
                                </div>
                                <div class="product-detail__info--rate__stock">Còn hàng</div>
                            </div>
                            <div class="product-detail__info--price product-detail__info--common">
                                <span><del>20.000 VNĐ</del></span>
                                <span>Từ <?php echo number_format($item->price_min/100000); ?> VNĐ
                                    đến <?php echo number_format($item->price_max/100000); ?> VNĐ
                                </span>
                                <span class="sale">Giảm giá 56%</span>
                            </div>
                            <div class="product-detail__info--promo product-detail__info--common">
                                <div class="row">
                                    <div class="col-3">
                                        Mã Giảm Giá Của Shop
                                    </div>
                                    <div class="col-9">
                                        <span class="promo">
                                            GiamGiaSoc80
                                        </span>
                                        <span class="promo">
                                            ChaoMungNgay2-9
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail__info--ship product-detail__info--common">
                                <div class="row">
                                    <div class="col-3">
                                        Vận Chuyển Toàn Quốc
                                    </div>
                                    <div class="col-9">
                                        <span class="freeship">Miễn Phí Vận Chuyển Toàn Quốc</span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail__info--type product-detail__info--common">
                                <div class="row">
                                    <div class="col-3">
                                        Phân loại
                                    </div>
                                    <div class="col-9">
                                        <?php
                                        $options = json_decode($item->tier_variations)[0]->options;
                                        if ($options) {
                                            foreach ($options as $option) {
                                                echo "<span class='product-type'>{$option}</span>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail__info--buy-number product-detail__info--common">
                                <div class="row">
                                    <div class="col-3">
                                        Số Lượng
                                    </div>
                                    <div class="col-9">
                                        <div class="buy-number">
                                            <input type="number" max="9999" maxlength="5" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-detail__info--buy-action product-detail__info--common">
                                <a class="buy-now btn" href="<?php BaseUrl("mua-tren-shopee/" . $item->slug . "." . $item->id); ?>">Mua Ngay</a>
                                <a class="add-cart btn" href="<?php BaseUrl("mua-tren-shopee/" . $item->slug . "." . $item->id); ?>">Mua trên shopee</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-detail__content">
                    <h2>Mô tả sản phẩm</h2>
                    <div class="product-detail__content--detail">
                        Croptop cổ tim Long Sleeve lên kệ với 7 tone màu đáng yêu. Chất liệu thun gân cotton mịn cực xinh, có dãn 4 chiều mang lại cảm giác thoải mái khi sử dụng ạ 😻😻
                        Chất liệu : Vải thun gân. Có mặt vải sợi dọc, tương tự mặt len.
                        Độ dày: dày dặn và mức độ dày tùy thuộc vào màu sắc, thường thì màu đậm có độ dày nhiều hơn so với các màu khác.
                        Độ co giãn: Co giãn và đàn hồi rất tốt cả chiều ngang và chiều dọc, giữa các sợi vải có spandex giữ độ dàn hồi, giúp sản phẩm giữ được form sau khi giặt. Chính tính chất co giãn cực tốt giúp tôn dáng người mặc, ôm dáng.
                        🔸️ Size: M L XL
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3  col-12">
            <div class="widget">
                <div class="widget__title">DANH MỤC</div>
                <div class="widget__body">
                    <ul>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                    </ul>
                </div>
            </div>
            <div class="widget">
                <div class="widget__title">Sản phẩm vừa xem</div>
                <div class="widget__body">
                    <ul>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                        <li><a href="<?php BaseUrl("nhom-san-pham/quan-ao-tap-gym"); ?>">Quần áo tập gym</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>