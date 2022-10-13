<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%integrations}}`.
 */
class m221013_121132_create_integrations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%integrations}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'endpoint' => $this->string(),
            'request_type' => $this->integer(),
            'params' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%integrations}}');
    }
}
