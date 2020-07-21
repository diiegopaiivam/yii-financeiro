<?php

use yii\db\Migration;
use yii\db\Expression;

/**
 * Handles the creation of table `{{%bills}}`.
 */
class m200721_185821_create_bills_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bills}}', [
            'id'                => $this->primaryKey(),
            'category_id'       => $this->integer()->notNull(),
            'type'              => $this->smallInteger(1)->notNull(),
            'date'              => $this->date()->notNull(),
            'description'       => $this->string(60)->notNull(),
            'amount'            => $this->decimal(10, 2)->notNull(),
            'status'            => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at'        => $this->dateTime()->notNull(),
            'updated_at'        => $this->dateTime()
        ]);

        $this->addForeignKey('fk_bills_category_id', '{{%bills}}', 'category_id', '{{%categories}}', 'id');

        $this->batchInsert('{{%bills}}', ['category_id', 'type', 'date', 'description', 'amount', 'created_at'], [
            //SALÁRIO
            [6, 1, '2020-01-05', 'Salário', 3000, new Expression('NOW()')],
            [6, 1, '2020-01-05', 'Salário', 3000, new Expression('NOW()')],

            //Cartão de Crédio
            [1, 2, '2020-01-20', 'Pizza', -25, new Expression('NOW()')],
            [1, 2, '2020-01-25', 'Cadeira Escritório', -350, new Expression('NOW()')],
            [1, 2, '2020-01-26', 'Mesa Escritório', -125, new Expression('NOW()')],
            [1, 2, '2020-01-30', 'Luminária', -35, new Expression('NOW()')],

            //Lazer
            [2, 2, '2020-01-05', 'Netflix', -45, new Expression('NOW()')],

            //Moradia
            [3, 2, '2020-01-02', 'Condominio', -355, new Expression('NOW()')],

            //Supermercado
            [4, 2, '2020-01-05', 'Compras', -500, new Expression('NOW()')],

            //Bike
            [5, 2, '2020-01-05', 'Manutenção', -10, new Expression('NOW()')],


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_bills_category_id', '{{%bills}}');
        $this->dropTable('{{%bills}}');
    }
}
