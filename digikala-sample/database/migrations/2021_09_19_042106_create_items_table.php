<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateItemsTable for items table in our database.
 *
 */
class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', \enum\Limit::NAME())->unique();
            $table->integer('view')->default(0);
            $table->integer('sell')->default(0);
            $table->integer('favorite')->default(0);
            $table->bigInteger('price')->nullable(false);
            $table->integer('number')->default(0);
            $table->bigInteger('score')->default(0);
            $table->foreignId('brand_id')
                ->references('id')
                ->on('brands')
                ->cascadeOnDelete();
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
            $table->string('properties', \enum\Limit::COMMENT());
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
        Schema::dropIfExists('items');
    }
}
