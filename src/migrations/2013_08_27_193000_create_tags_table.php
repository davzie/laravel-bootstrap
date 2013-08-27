<?php
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('tags') )
        {
            Schema::create('tags', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('tag',255);
                $table->integer('taggable_id')->unsigned();
                $table->string('taggable_type',255);
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
        Schema::drop('tags');
    }

}