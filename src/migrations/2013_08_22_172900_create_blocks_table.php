<?php
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('blocks') )
        {
            Schema::create('blocks', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('title',255);
                $table->string('key',255);
                $table->unique('key');
                $table->text('content');
                $table->index('id');
                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blocks');
    }

}