<div class="container-xxl container-xl container-md container auth">
    <div class="box">
        <div class="row">
            <form method="POST" action="<?php BaseUrl(URL_REGISTER); ?>">
                <div class="col-lg-12 pb-2">
                    <h1 class="text-center">Đăng ký tài khoản</h1>
                </div>
                <div class="col-12 pb-2 pt-2">
                    <input type="text" name="full_name" class="form-control" placeholder="Họ tên" />
                </div>
                <div class="col-12 pb-2 pt-2">
                    <input type="text" name="email" class="form-control" placeholder="Email" />
                </div>
                <div class="col-12 pb-2 pt-2">
                    <input type="text" name="user_name" class="form-control" placeholder="Tên đăng nhập" />
                </div>
                <div class="col-12  pb-2 pt-2">
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu" />
                </div>
                <div class="col-12 pb-2 pt-2">
                    <button class="btn m-auto w-100 text-uppercase text-bold" style="background-color: #ff7e33;">Đăng ký</button>
                </div>
                <?php 
                    app()->showErrors();
                ?>
                <div class="col-12 pb-2">
                    <hr />
                </div>
                <div class="col-12 pb-2">
                    <a href="<?php BaseUrl('dang-nhap'); ?>" class="btn m-auto w-100 text-uppercase text-bold" style="background-color: #007bc4;">Đăng nhập tài khoản</a>
                </div>
            </form>
        </div>
    </div>
</div>