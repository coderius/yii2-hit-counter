<?php

use yii\db\Migration;

/**
 * Class m190926_110717_hit_counter__table
 */
class m190926_110717_hit_counter__table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ('mysql' === $this->db->driverName) {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%hit_counter}}', [
            'id' => $this->primaryKey()->unsigned(),
            'counter_id' => $this->string()->notNull(),
            'cookie_mark'=> $this->char(32),
            'js_cookei_enabled' => $this->boolean()->notNull()->defaultValue(0),
            'js_java_enabled' => $this->boolean()->notNull()->defaultValue(0),
            'js_timezone_offset' => $this->integer()->null(),
            'js_timezone' => $this->string(),
            'js_current_url' => $this->string()->notNull(),
            'js_referer_url' => $this->string(),
            'js_screen_width' => $this->integer()->null(),
            'js_screen_height' => $this->integer()->null(),
            'js_color_depth' => $this->integer()->null(),
            'js_browser_language' => $this->string()->null(),
            'js_history_length' => $this->integer()->null(),
            'js_is_toutch device' => $this->boolean()->notNull()->defaultValue(0),
            'js_processor_ram' => $this->integer()->null(),

            'serv_ip' => $this->char(20)->notNull(),
            'serv_user_agent' => $this->string(),
            'serv_referer_url' => $this->string(),
            'serv_server_name' => $this->string(),
            'serv_auth_user_id' => $this->integer()->unsigned()->null(),
            'serv_port' => $this->char(20),
            'serv_cookies' => 'JSON',
            
            'serv_os' => $this->string(),
            'serv_client' => $this->string(),
            'serv_device' => $this->string(),
            'serv_brand' => $this->string(),
            'serv_model' => $this->string(),
            'serv_bot' => $this->string(),
            'serv_host_by_ip' => $this->string(),
            'serv_is_proxy_or_vpn' => $this->boolean()->notNull()->defaultValue(0),

            'createdAt' => $this->dateTime()->notNull(),
        ], $tableOptions);

        $this->createIndex('{{%idx-hit_counter-cookie_mark}}', '{{%hit_counter}}', 'cookie_mark');
        $this->createIndex('{{%idx-hit_counter-serv_ip}}', '{{%hit_counter}}', 'serv_ip');
        $this->createIndex('{{%idx-hit_counter-serv_auth_user_id}}', '{{%hit_counter}}', 'serv_auth_user_id');
        $this->createIndex('{{%idx-hit_counter-createdAt}}', '{{%hit_counter}}', 'createdAt');

        $this->addForeignKey(
            '{{%fk-hit_counter-serv_auth_user_id}}',
            '{{%hit_counter}}',
            'serv_auth_user_id',
            '{{%user}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );

        $this->addCommentOnColumn('{{%hit_counter}}', 'serv_auth_user_id', 'User id if exists');
        $this->addCommentOnColumn('{{%hit_counter}}', 'serv_ip', 'User ip');
        $this->addCommentOnColumn('{{%hit_counter}}', 'counter_id', 'Counter id generated in widget and passed by query param in inage src');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hit_counter}}');
        echo "m190926_110717_hit_counter__table dropped.\n";
        // echo "m190926_110717_hit_counter__table cannot be reverted.\n";

        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190926_110717_hit_counter__table cannot be reverted.\n";

        return false;
    }
    */
}
