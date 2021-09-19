<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title', \enum\Limit::NAME())->nullable(false);
            $table->string('alt', \enum\Limit::NAME());
            $table->string('path', \enum\Limit::LINK());
            $table->foreignId('imageable_id')
                ->references('id')
                ->on('images')
                ->cascadeOnDelete();
            $table->string('imageable_type');
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
        Schema::dropIfExists('images');
    }
}
