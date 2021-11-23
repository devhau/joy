<div class=" product-box">
    <div class="product-box__image">
        <a href="<?php BaseUrl("san-pham/" . $item->slug . "." . $item->id); ?>" title="Áo cầu lông Yonex Y1718">
            <img src="https://cf.shopee.vn/file/<?php echo $item->image; ?>" />
        </a>
        <span class="product-box__promo">Giảm 30%: khuyenmai2021</span>
    </div>
    <div class="product-box__title"><a href="<?php BaseUrl("san-pham/" . $item->slug . "." . $item->id); ?>" title="<?php echo $item->name; ?>">
            <?php echo $item->name; ?>
        </a>
    </div>
    <div class="product-box__code">
        Mã SP: 02414
    </div>
    <div class="product-box__price">
        <span class="product-box__price--sale">
            Từ <?php echo number_format($item->price_min); ?> VNĐ <br />
            đến <?php echo number_format($item->price_max); ?> VNĐ
        </span>
        <!--span class="product-box__price--del">
                <del>
                    Từ 12.900.000 VNĐ <br />
                    đến 39.000.000 VNĐ
                </del>
            </span-->
    </div>
    <div class="product-box__acction">
        <a class="product-box__acction--readmore btn m-auto" href="<?php BaseUrl("san-pham/" . $item->slug . "." . $item->id); ?>" title="Áo cầu lông Yonex Y1718">Chi tiết</a>
        <a class="product-box__acction--addcart btn m-auto" href="<?php BaseUrl("mua-tren-shopee/" . $item->slug . "." . $item->id); ?>">Mua trên shopee</a>
    </div>
    <div class="product-box__sale">
    </div>
</div>