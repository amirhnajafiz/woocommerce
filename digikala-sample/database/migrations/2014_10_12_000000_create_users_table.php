<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUsersTable.
 *
 */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name', \App\Enums\Limit::NAME())
                ->nullable(false);

            $table->string('email')
                ->nullable(false)
                ->unique();

            $table->timestamp('email_verified_at')
                ->nullable();

            $table->string('phone', \App\Enums\Limit::PHONE())
                ->nullable(false)
                ->unique();

            $table->string('role')
                ->default(\App\Enums\Role::USER());

            $table->string('password');
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
        Schema::dropIfExists('user');
    }
}
