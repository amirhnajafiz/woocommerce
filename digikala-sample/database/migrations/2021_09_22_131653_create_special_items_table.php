<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSpecialItemsTable.
 *
 */
class CreateSpecialItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')
                ->unique()
                ->nullable(false)
                ->references('id')
                ->on('items')
                ->cascadeOnDelete();
            $table->date('expire_date')->default(now()->addMonth());
            $table->integer('discount')->default(0);
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
        Schema::dropIfExists('special_items');
    }
}
