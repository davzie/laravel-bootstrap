<?php
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( !Schema::hasTable('settings') )
        {
            Schema::create('settings', function($table)
            {

                $table->engine = 'InnoDB';

                $table->increments('id');
                $table->string('key',255);
                $table->string('label',255);
                $table->string('value',255);
                $table->unique('key');
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
        Schema::drop('settings');
    }

}