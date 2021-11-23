<div class="container-xxl container-xl container-md container auth">
    <div class="box">
        <div class="row">
            <form method="POST" action="<?php BaseUrl(URL_LOGIN); ?>">
                <div class="col-lg-12 pb-2">
                    <h1 class="text-center">Đăng Nhập</h1>
                </div>
                <div class="col-12 pb-2 pt-2">
                    <input type="text" name="user_name" class="form-control" placeholder="Tên đăng nhập" />
                </div>
                <div class="col-12 pb-2 pt-2">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" />
                </div>
                <div class="col-12 pb-2 pt-2">
                    <input type="checkbox" id="remeber" name="remeber" /> <label for="remeber">Nhớ tài khoản đăng nhập</label>
                </div>
                <div class="col-12 pb-2 pt-2">
                    Bạn quên mật khẩu? <a href="<?php BaseUrl("lay-mat-khau"); ?>">lấy mật khẩu ở đây</a>
                </div>
                <?php
                app()->showErrors();
                ?>
                <div class="col-12 pb-2 pt-2">
                    <button class="btn m-auto w-100 text-uppercase text-bold" style="background-color: #007bc4;">Đăng nhập</button>
                </div>
                <div class="col-12 pb-2">
                    <hr />
                </div>
                <div class="col-12 pb-2">
                    <a href="<?php BaseUrl('dang-ky'); ?>" class="btn m-auto w-100 text-uppercase text-bold" style="background-color: #ff7e33;">Đăng ký tài khoản mới</a>
                </div>
            </form>
        </div>
    </div>
</div>