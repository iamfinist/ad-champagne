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

        $this->insert('{{%integrations}}', [
            'name' => 'Поставщик 1',
            'endpoint' => 'https://google.com/',
            'request_type' => 2,
            'params' => 'id={id}&goal={goal}&amount={price}',
        ]);

        $this->insert('{{%integrations}}', [
            'name' => 'Поставщик 2',
            'endpoint' => 'https://example.com/postback',
            'request_type' => 1,
            'params' => 'cid={id}&event={goal}&price={price}',
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
