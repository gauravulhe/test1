<?php
use Migrations\AbstractMigration;

class AddUsernameIndexToProducts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('products');
        $table->addColumn('username', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addIndex([
            'username',
        ], [
            'name' => 'BY_USERNAME',
            'unique' => false,
        ]);
        $table->update();
    }
}
