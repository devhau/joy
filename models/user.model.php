<?php

class UserModel extends Model
{
    protected $table = "tbl_users";
    protected $fillable = ["user_name", "email", "password", "full_name", "address", "is_active"];
    public function FindByUserNameOrEmail($user_name)
    {
        return $this->queryObject('select * from `' . $this->table . '` where user_name = ? Or email = ?', $user_name, $user_name);
    }
    public function CheckUsername($user_name)
    {
        return $this->query('select 1 from `' . $this->table . '` where user_name = ?', $user_name)->numRows() > 0;
    }
    public function CheckEmail($email)
    {
        return $this->query('select 1 from `' . $this->table . '` where email = ?', $email)->numRows() > 0;
    }
}
