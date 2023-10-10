<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function($table)
            {
                $table->increments('id');	
                $table->string('name', 100);
                $table->text('description');	
                $table->float('price');	
                $table->tinyInteger('status')->default(0);	
                $table->timestamps();	
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
