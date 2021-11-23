<div class="panel">
    <div class="panel__header">
        <a class="btn btn-primary btn-sm" href="<?php BaseUrl(URL_ADMIN . '/product/add'); ?>">Thêm mới</a>
    </div>
    <div class="panel__body">
        <?php BComponent("common.table", [
            'configs' => [
                'data' => $data,
                'columns' => [
                    'user_name' => [
                        'title' => 'Tài khoản'
                    ],
                    'email' => [
                        'title' => 'Email'
                    ],
                    'full_name' => [
                        'title' => 'Họ Tên'
                    ]
                ],
                'acction' => [
                    function ($row) {
                        return "<a class='btn btn-success btn-sm' href='" . BaseUrl(URL_ADMIN . '/product/edit/' . $row->id, true) . "'>Sửa</a> ";
                    },
                    function ($row) {
                        return "<a class='btn btn-danger btn-sm' href='" . BaseUrl(URL_ADMIN . '/product/delete/' . $row->id, true) . "'>Xóa</a> ";
                    }
                ]
            ]
        ]); ?>
    </div>
    <div class="panel__footer">
        <div class="paging">
            <span>Trang</span>
            <ul>
                <li><a href="">1</a></li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
                <li><a href="">6</a></li>
            </ul>
            <select class="form-control" style="width: 50px;padding: 0px 10px;height: 35px;margin: 5px;">
                <option>10</option>
                <option>15</option>
            </select>
        </div>
    </div>
</div>