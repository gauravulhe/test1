<?php
use Migrations\AbstractMigration;

class AddAbcIndexToProducts extends AbstractMigration
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
        $table->addColumn('abc', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addIndex([
            'abc',
        ], [
            'name' => 'BY_ABC',
            'unique' => false,
        ]);
        $table->update();
    }
}
