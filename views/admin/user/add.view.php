<form class="panel" method="POST">
    <div class="panel__header">
        <h1>Thêm mới tài khoản</h1>
    </div>
    <div class="panel__body">
        <div style="max-width: 450px;" class="p-2">
            <div class="pb-2">
                Họ tên
            </div>
            <div class="pb-2">
                <input name="full_name" class="form-control" />
            </div>
            <div class="pb-2">
                Tài khoản
            </div>
            <div class="pb-2">
                <input name="user_name" class="form-control" />
            </div>
            <div class="pb-2">
                Email
            </div>
            <div class="pb-2">
                <input name="email" class="form-control" />
            </div>
            <div class="pb-2">
                Mật khẩu
            </div>
            <div class="pb-2">
                <input name="password" type="password" class="form-control" />
            </div>
        </div>
    </div>
    <div class="panel__footer">
        <button class="btn btn-primary btn-sm">Lưu thông tin</button>
        <a href="<?php BaseUrl(URL_ADMIN . '/user'); ?>" class="btn btn-light btn-sm">Hủy</a>
    </div>
</form>