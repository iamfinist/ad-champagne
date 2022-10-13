<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%events}}`.
 */
class m221013_121945_create_events_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%events}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer(11),
            'goal' => $this->string(),
            'price' => $this->double(2),
            'integration_id' => $this->integer(),
            'status' => $this->integer()
        ]);

        $this->addForeignKey('fk_integration', '{{%events}}', 'integration_id', '{{%integrations}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_integration', '{{%events}}');
        $this->dropTable('{{%events}}');
    }
}
