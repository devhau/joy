<?php

class Table
{
    private $table_name = "";
    private $columns = [];
    private $keys = [];
    private $timestamp = false;
    //logtime TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    public function AddTimestamp()
    {
        $this->timestamp = true;
    }
    public function __construct($table_name)
    {
        $this->table_name = $table_name;
    }
    public function AddKey($key, $value = null)
    {
        if (!$value) {
            $value = "int NOT NULL AUTO_INCREMENT";
        }
        $this->keys[$key] = $value;
    }
    public function AddColumn($key, $value = null)
    {
        if (!$value) {
            $value = "varchar(255) NOT NULL";
        }
        $this->columns[$key] = $value;
    }
    public function GenCreateTable()
    {
        $sql  = 'CREATE TABLE `' . $this->table_name . '`  (';
        $keys = "";
        foreach ($this->keys as $key => $value) {
            $sql  = $sql . "`{$key}` $value ,";
            if ($keys == "") {
                $keys = "`{$key}`";
            } else {
                $keys = $keys . ",`{$key}`";
            }
        }
        foreach ($this->columns as $key => $value) {
            $sql  = $sql . "`{$key}` $value ,";
        }
        if ($this->timestamp) {
            $sql  = $sql . " `create_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,";
            $sql  = $sql . " `update_at`  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,";
        }
        $sql  = $sql . "PRIMARY KEY({$keys}))";
        return $sql;
    }
    public function GenDropTable()
    {
        return "DROP TABLE IF EXISTS `" . $this->table_name . "`;";
    }
}
