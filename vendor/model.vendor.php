<?php

class Model
{
    private $database;
    private $class_name;
    protected $table;
    protected $key = "id";
    protected $fillable = [];
    protected $hidden = [];
    protected $data;
    public static function New(): Model
    {
        $child = get_called_class();
        return new $child;
    }
    public static function Find($id)
    {
        $child = get_called_class();
        return (new $child)->getByKey($id);
    }
    public function ConvertToObject($data)
    {
        if (isset($data) && $data != null && count($data) > 0) {
            $obj = new $this->class_name;
            $obj->data = $data;
            return $obj;
        }
        return null;
    }
    public function __construct()
    {
        app()->loadVendor('database');
        $this->database = app()->getDatabase();
        $this->class_name = get_class($this);
        $this->data[$this->key] = null;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getByKey($id)
    {
        return $this->queryObject("select * from `" . $this->table . "` where `" . $this->key . "` = ?", $id);
    }
    public function getAll($isObject = true)
    {
        if ($isObject) {
            return $this->query("select * from " . $this->table)->fetchAll(function ($row) {
                return $this->ConvertToObject($row);
            });
        } else {
            return $this->query("select * from " . $this->table)->fetchAll();
        }
    }
    public function query(): Database
    {
        return $this->database->query(...func_get_args());
    }
    public function queryObject()
    {
        return $this->ConvertToObject($this->database->query(...func_get_args())->fetchArray());
    }
    public function checkExits()
    {
        $sql = 'SELECT FROM `' . $this->table . '` where ' . $this->key . '=?';
        $values = [];
        $values[] = $this->getValueKey();
        $this->query($sql, ...$values)->affectedRows();
        return $this->database->numRows() > 0;
    }
    public function Save($isCheck = false)
    {
        if ($isCheck) {
            $isCheck = $this->getValueKey() != null && $this->checkExits();
        } else {
            $isCheck = $this->getValueKey() != null;
        }
        if ($isCheck) {
            $this->Update();
        } else {
            $this->Insert();
        }
    }
    public function lastInsertID()
    {
        return $this->database->lastInsertID();
    }
    protected function getValueKey()
    {
        return $this->data[$this->key];
    }
    public function Insert()
    {
        $sql = "INSERT INTO `" . $this->table . "` (";
        $sql_value = ") value (";
        $prex = "";
        $values = [];
        foreach ($this->data as $key => $value) {
            $sql = $sql . $prex . $key;
            $sql_value = $sql_value . $prex . '?';
            $values[] = $value;
            if ($prex == "")  $prex = ",";
        }

        $sql = $sql . $sql_value . ")";
        $this->query($sql, ...$values)->affectedRows();
        $this->data[$this->key] = $this->lastInsertID();
        return $this;
    }
    public function Update()
    {
        $sql = "UPDATE `" . $this->table . "` SET ";
        $prex = "";
        foreach ($this->data as $key => $value) {
            if ($key == $this->key) continue;
            $sql = $sql . $prex . $key . "= ? ";
            $values[] = $value;
            if ($prex == "")  $prex = ",";
        }
        $sql .= " where {$this->key} =?";
        $values[] = $this->getValueKey();
        $this->query($sql, ...$values)->affectedRows();
    }
    public function Delete()
    {
        $sql = 'DELETE FROM `' . $this->table . '` where ' . $this->key . '=?';
        $values = [];
        $values[] = $this->getValueKey();
        $this->query($sql, ...$values)->affectedRows();
    }
    public function __get($name)
    {
        return $this->data[$name];
    }
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
    public function Fill($data)
    {
        if (!$data) return;
        if ($this->fillable) {
            foreach ($this->fillable as $key) {
                if (isset($data[$key]))
                    $this->data[$key] = $data[$key];
            }
        } else {
            foreach ($this->data as $key => $value) {
                if (isset($data[$key]))
                    $this->data[$key] = $data[$key];
            }
        }
    }
    public function TRUNCATE()
    {
        $this->query('TRUNCATE TABLE ' . $this->table);
    }
}
