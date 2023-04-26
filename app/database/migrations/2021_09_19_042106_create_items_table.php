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

            $table->string('name', \App\Enums\Limit::NAME())
                ->unique();

            $table->string('slug', \App\Enums\Limit::NAME())
                ->unique();

            $table->bigInteger('price')
                ->nullable(false);

            $table->integer('number')
                ->default(0);

            $table->foreignId('brand_id')
                ->nullable(true)
                ->default(null)
                ->references('id')
                ->on('brands')
                ->cascadeOnDelete();

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
