<?php

use yii\db\Migration;
use yii\db\Schema;

class m170921_160116_news extends Migration
{
    public function up()
    {
        $this->createTable('news' ,[
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING,
            'content' => Schema::TYPE_TEXT
        ]);

    }

    public function down()
    {
        $this->dropTable('news');
    }
}
