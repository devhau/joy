<div class="product-list">
    <h2>

        <?php if (isset($link) && $link != "") {
            echo '<a href ="' . $link . '" title="' . $title . '">' . $title . '</a>';
        } else {
            echo $title;
        } ?></h2>
    <div class="product-list__content row">
        <?php
        foreach ($data as $item) {
        ?>
            <div class="<?php echo isset($col) && $col != "" ? $col : "col-xl-4 col-lg-4 col-md-6 col-12"; ?>">
                <?php app()->loadTheme("component.product-box", ['item' => $item]); ?>
            </div>
        <?php
        } ?>
    </div>
</div>