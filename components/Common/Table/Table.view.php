<div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 80px;">STT</th>
                <?php foreach ($tableConfigs['columns'] as $key => $column) {
                    if (isset($column['attr'])) {
                        echo "<th {$column['attr']}>{$column['title']}</th>";
                    } else {
                        echo "<th>{$column['title']}</th>";
                    }
                } ?>
                <th style="width: auto;">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tableConfigs['data'] as $row) {
            ?> <tr>
                    <th>1</th>
                    <?php foreach ($tableConfigs['columns'] as $key => $column) {
                        if (isset($column['attr'])) {
                            echo "<th {$column['attr']}>{$row->{$key}}</th>";
                        } else {
                            echo "<th>{$row->{$key}}</th>";
                        }
                    } ?>
                    <th style="width: auto;">
                        <?php foreach ($tableConfigs['acction'] as $callback) {
                            echo "{$callback($row,$self)}";
                        } ?>
                    </th>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>