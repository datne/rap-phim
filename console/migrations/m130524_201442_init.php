<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $date = date_create();
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        //create table user
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string(50)->notNull()->unique(),
            'cmnd' => $this->string(12)->notNull()->unique(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT'),
            'role_id' => $this->integer()->notNull(),
            'isActive' => $this->boolean()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table role
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'role_name' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);


        //create table theloai phim 
        $this->createTable('category_phim', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        // create table theloai article
        $this->createTable('category_article', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table rap
        $this->createTable('daodien', [
            'id' => $this->primaryKey(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT')->notNull(),
            'quoctich' => $this->string(50)->notNull(),                  
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'slug' => $this->text(),
            'views' => $this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table city 
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'cityname' => $this->string(32)->notNull(),            
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table rap
        $this->createTable('rap', [
            'id' => $this->primaryKey(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT')->notNull(),
            'giave' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT')->notNull(),
            'active' => $this->boolean(),
            'city_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        // create table phongchieu
        $this->createTable('phongchieu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),       
            'sodo' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT')->notNull(),          
            'rap_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table phim
        $this->createTable('phim', [
            'id' => $this->primaryKey(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT'),   
            'cate_phim_id' => $this->integer()->notNull(),      
            'dd_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'slug' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table article
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT'),   
            'cate_article_id' => $this->integer()->notNull(),                
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'slug' => $this->text(),
            'publish' => $this->boolean()->defaultValue(0),
            'posterId' => $this->integer(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table chitietgd
        $this->createTable('chitietgd', [
            'id' => $this->primaryKey(),
            'active' => $this->boolean()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'total' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),
        ], $tableOptions);

        //create table ve
        $this->createTable('ve', [
            'id' => $this->primaryKey(),
            'lichchieu_id' => $this->integer()->notNull(),
            'gd_id' => $this->integer()->notNull(),
            'chongoi' => $this->string(3)->notNull(),  
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),         
        ], $tableOptions);
        
        $this->createTable('lichchieu', [
            'id' => $this->primaryKey(),
            'ngaychieu' => $this->date()->notNull(),
            'giochieu' => $this->time()->notNull(),
            'phim_id' => $this->integer()->notNull(),
            'phong_id' => $this->integer()->notNull(),
            'gia' => $this->integer(),
            'selected_seat' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT'),  
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'isDeleted' => $this->boolean()->defaultValue(0),
            'deletedUserId' => $this->integer(),
            'deletedTime'=> $this->integer(),         
        ], $tableOptions);
      

        //fk ve-chitietgd
        $this->addForeignKey("fk_ve_ctgd","ve","gd_id","chitietgd","id");

        //fk ve-lichchieu
        $this->addForeignKey("fk_ve_lichchieu","ve","lichchieu_id","lichchieu","id");

        //fk lichchieu-phim
        $this->addForeignKey("fk_lichchieu_phim","lichchieu","phim_id","phim","id");

        //fk lichchieu-phongchieu
        $this->addForeignKey("fk_lichchieu_phongchieu","lichchieu","phong_id","phongchieu","id"); 

        //fk phongchieu-rap
        $this->addForeignKey("fk_phongchieu_rap","phongchieu","rap_id","rap","id"); 

        //fk phim-theloai
        $this->addForeignKey("fk_phim_categoryPhim","phim","cate_phim_id","category_phim","id"); 

        //fk phim-theloai
        $this->addForeignKey("fk_article_categoryArticle","article","cate_article_id","category_article","id"); 

        //fk phim-daodien
        $this->addForeignKey("fk_phim_daodien","phim","dd_id","daodien","id");  

        // fk rap-city
        $this->addForeignKey("fk_rap_city","rap","city_id","city","id");   

        //fk chitietgd-user
        $this->addForeignKey("fk_chitietgd_user","chitietgd","user_id","user","id"); 

        //fk user-role
        $this->addForeignKey("fk_user_role","user","role_id","role","id"); 

        //create data
        
        $this->insert('city', [
            'cityname' => 'Thành Phố Hồ Chí Minh',
            'created_at' => date_timestamp_get($date),
            'updated_at' => date_timestamp_get($date),
        ]);
        
        $this->insert('city', [
            'cityname' => 'Cà Mau',
            'created_at' => date_timestamp_get($date),
            'updated_at' => date_timestamp_get($date),
        ]);

        $this->insert('city', [
            'cityname' => 'Cần Thơ',
            'created_at' => date_timestamp_get($date),
            'updated_at' => date_timestamp_get($date),
        ]);

        $this->insert('role', [
            'role_name' => 'admin',
            'created_at' => date_timestamp_get($date),
            'updated_at' => date_timestamp_get($date),
        ]);
        $this->insert('role', [
            'role_name' => 'customer',
            'created_at' => date_timestamp_get($date),
            'updated_at' => date_timestamp_get($date),
        ]);

        $this->insert('user', [          
            'username' => 'admin',
            'password_hash' => Yii::$app->security->generatePasswordHash("123123"),
            'auth_key' => 'test100key',
            'email' => 'admin@gmail.com',
            'cmnd' =>'123456789',
            'created_at' => date_timestamp_get($date),
            'updated_at' => date_timestamp_get($date),
            'role_id' => 1,
        ]);
        $this->insert('user', [          
            'username' => 'datdat',
            'password_hash' => Yii::$app->security->generatePasswordHash("123123"),
            'auth_key' => 'test100key',
            'email' => 'datdat@gmail.com',
            'cmnd' =>'23455432',
            'created_at' => date_timestamp_get($date),
            'updated_at' => date_timestamp_get($date),
            'role_id' => 2,
        ]);
    }

    public function down()
    {   

        $this->dropForeignKey("fk_user_role","user");
        $this->dropForeignKey("fk_chitietgd_user","chitietgd");
        $this->dropForeignKey("fk_rap_city","rap");
        $this->dropForeignKey("fk_phim_daodien","phim");
        $this->dropForeignKey("fk_phim_categoryPhim","phim");
        $this->dropForeignKey("fk_article_categoryArticle","article");
        $this->dropForeignKey("fk_phongchieu_rap","phongchieu");
        $this->dropForeignKey("fk_lichchieu_phongchieu","lichchieu");
        $this->dropForeignKey("fk_lichchieu_phim","lichchieu");
        $this->dropForeignKey("fk_ve_lichchieu","ve");
        $this->dropForeignKey("fk_ve_ctgd","ve");


        $this->dropTable('lichchieu');
        $this->dropTable('ve');
        $this->dropTable('chitietgd');
        $this->dropTable('article'); 
        $this->dropTable('phim');
        $this->dropTable('phongchieu');  
        $this->dropTable('rap');  
        $this->dropTable('city');
        $this->dropTable('daodien');
        $this->dropTable('category_article'); 
        $this->dropTable('category_phim');       
        $this->dropTable('role');
        $this->dropTable('user');
    }
}
