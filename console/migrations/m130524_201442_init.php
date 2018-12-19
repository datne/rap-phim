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
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string(50)->notNull()->unique(),
            'cmnd' => $this->string(12)->notNull()->unique(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT'),
            'role_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        //create table role
        $this->createTable('role', [
            'id' => $this->primaryKey(),
            'role_name' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);


        //create table theloai 
        $this->createTable('theloai', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
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
        ], $tableOptions);

        //create table city 
        $this->createTable('city', [
            'id' => $this->primaryKey(),
            'cityname' => $this->string(32)->notNull(),            
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
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
        ], $tableOptions);

        // create table phongchieu
        $this->createTable('phongchieu', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),       
            'sodo' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT')->notNull(),          
            'rap_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        //create table phim
        $this->createTable('phim', [
            'id' => $this->primaryKey(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT'),   
            'tl_id' => $this->integer()->notNull(),      
            'dd_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'slug' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
        ], $tableOptions);

        //create table postreview
        $this->createTable('postreview', [
            'id' => $this->primaryKey(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT')->notNull(),   
            'phim_id' => $this->integer()->notNull(),                 
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'slug' => $this->text(),
            'views' => $this->integer(),
        ], $tableOptions);


        //create table chitietgd
        $this->createTable('chitietgd', [
            'id' => $this->primaryKey(),
            'active' => $this->boolean()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'total' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ], $tableOptions);

        //create table ve
        $this->createTable('ve', [
            'id' => $this->primaryKey(),
            'lichchieu_id' => $this->integer()->notNull(),
            'gd_id' => $this->integer()->notNull(),
            'chongoi' => $this->string(3)->notNull(),  
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),         
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
        ], $tableOptions);

        $this->createTable('postnews', [
            'id' => $this->primaryKey(),
            'attributes' => $this->getDb()->getSchema()->createColumnSchemaBuilder('LONGTEXT')->notNull(),                        
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'slug' => $this->text()->notNull(),
            'views' => $this->integer()->notNull(),
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

        //fk postreview-phim
        $this->addForeignKey("fk_postreview_phim","postreview","phim_id","phim","id");

        //fk phim-theloai
        $this->addForeignKey("fk_phim_theloai","phim","tl_id","theloai","id"); 

        //fk phim-daodien
        $this->addForeignKey("fk_phim_daodien","phim","dd_id","daodien","id");  

        // fk rap-city
        $this->addForeignKey("fk_rap_city","rap","city_id","city","id");   

        //fk chitietgd-user
        $this->addForeignKey("fk_chitietgd_user","chitietgd","user_id","user","id"); 

        //fk user-role
        $this->addForeignKey("fk_user_role","user","role_id","role","id"); 

        //create data
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
        $this->dropForeignKey("fk_phim_theloai","phim");
        $this->dropForeignKey("fk_postreview_phim","postreview");
        $this->dropForeignKey("fk_phongchieu_rap","phongchieu");
        $this->dropForeignKey("fk_lichchieu_phongchieu","lichchieu");
        $this->dropForeignKey("fk_lichchieu_phim","lichchieu");
        $this->dropForeignKey("fk_ve_lichchieu","ve");
        $this->dropForeignKey("fk_ve_ctgd","ve");


        $this->dropTable('postnews');
        $this->dropTable('lichchieu');
        $this->dropTable('ve');
        $this->dropTable('chitietgd');
        $this->dropTable('postreview');
        $this->dropTable('phim');
        $this->dropTable('phongchieu');  
        $this->dropTable('rap');  
        $this->dropTable('city');
        $this->dropTable('daodien');
        $this->dropTable('theloai');       
        $this->dropTable('role');
        $this->dropTable('user');
    }
}
