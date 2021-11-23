<?php

app()->loadVendor('table');
app()->loadModel('user');
app()->loadVendor('database');
app()->loadVendor('auth');
$db = app()->getDatabase();
//tbl_users
$table = new Table("tbl_users");
$table->AddKey('id', 'int NOT NULL AUTO_INCREMENT');
$table->AddColumn('user_name', 'varchar(255) NOT NULL');
$table->AddColumn('email', 'varchar(255) NOT NULL');
$table->AddColumn('password', 'varchar(255) NOT NULL');
$table->AddColumn('full_name', 'varchar(255) NOT NULL');
$table->AddColumn('address', 'varchar(255) NOT NULL');
$table->AddColumn('is_active', 'bit NULL');
$table->AddTimestamp();
$db->query($table->GenDropTable());
$db->query($table->GenCreateTable());

//tbl_roles
$table = new Table("tbl_roles");
$table->AddKey('id', 'int NOT NULL AUTO_INCREMENT');
$table->AddColumn('name', 'varchar(255) NOT NULL');
$table->AddColumn('key', 'varchar(255) NOT NULL');
$table->AddTimestamp();
$db->query($table->GenDropTable());
$db->query($table->GenCreateTable());

//tbl_user_roles
$table = new Table("tbl_user_roles");
$table->AddKey('id', 'int NOT NULL AUTO_INCREMENT');
$table->AddColumn('table_id', 'int NOT NULL');
$table->AddColumn('role_id', 'int NOT NULL');
$table->AddTimestamp();
$db->query($table->GenDropTable());
$db->query($table->GenCreateTable());



//tbl_products
$table = new Table("tbl_products");
$table->AddKey('id', 'int NOT NULL AUTO_INCREMENT');
$table->AddColumn('sku_code', 'varchar(255) NOT NULL');
$table->AddColumn('slug', 'varchar(500) NOT NULL');
$table->AddColumn('tier_variations', 'varchar(2000) NULL');
$table->AddColumn('name', 'varchar(500) NOT NULL');
$table->AddColumn('image', 'varchar(255) NULL');
$table->AddColumn('images', 'varchar(2000) NULL');
$table->AddColumn('link_ref', 'varchar(255) NOT NULL');

$table->AddColumn('discount', 'varchar(255)  NULL');
$table->AddColumn('raw_discount', 'int  NULL');
$table->AddColumn('discount_unit', 'int  NULL'); // 0- default Percent, 1 - money

//
$table->AddColumn('brand', 'varchar(255) NULL');
$table->AddColumn('currency', 'varchar(255) NULL');
$table->AddColumn('price', 'int NOT NULL');
$table->AddColumn('price_min', 'int NOT NULL');
$table->AddColumn('price_max', 'int NOT NULL');

$table->AddColumn('price_before_discount', 'int  NULL');
$table->AddColumn('price_min_before_discount', 'int  NULL');
$table->AddColumn('price_max_before_discount', 'int  NULL');

$table->AddColumn('is_active', 'bit NULL');
$table->AddColumn('is_trending', 'bit NULL');
$table->AddColumn('is_new', 'bit NULL');
$table->AddColumn('is_sale', 'bit NULL');
$table->AddTimestamp();
$db->query($table->GenDropTable());
$db->query($table->GenCreateTable());


//tbl_catalogs
$table = new Table("tbl_catalogs");
$table->AddKey('id', 'int NOT NULL AUTO_INCREMENT');
$table->AddColumn('name', 'varchar(255) NOT NULL');
$table->AddColumn('slug', 'varchar(500) NOT NULL');
$table->AddColumn('parent_id', 'int NULL');

$table->AddTimestamp();
$db->query($table->GenDropTable());
$db->query($table->GenCreateTable());

$db_table = new UserModel();
$db_table->user_name = "admin";
$db_table->email = "admin@admin.com";
$db_table->password = HashPassword("1234@1234");
$db_table->full_name = "Nguyễn Văn Hậu";
$db_table->address = "Hà nội";
$db_table->is_active = 1;
$db_table->save();

echo "<br/>";
echo "Done";
