<?php

use Phinx\Migration\AbstractMigration;

class UsersMovimentacaoTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {

        $tableUser = $this->table('user');

        $tableUser->addColumn('username', 'string', ['null' => false, 'length' => 255]);
        $tableUser->addColumn('password', 'string', ['null' => false, 'length' => 255]);
        $tableUser->addColumn('name', 'string', ['null' => false, 'length' => 255]);
        $tableUser->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP']);
        $tableUser->addColumn('updated_at', 'datetime', [ 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP']);
        $tableUser->addIndex(['username'], ['unique' => true]);

        $tableUser->create();

        $tableMov = $this->table('movimentacao');

        $tableMov->addColumn('user_id', 'integer', []);
        $tableMov->addColumn('value', 'decimal', ['null' => false, 'scale' => 2, 'precision' => 10]);
        $tableMov->addColumn('description', 'string', ['null' => true]);
        $tableMov->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP']);

        $tableMov->addForeignKey('user_id', 'user');

        $tableMov->create();

    }
}
