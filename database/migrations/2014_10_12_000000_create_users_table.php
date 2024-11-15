<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->text('category_id');
            $table->text('subcategory_id')->nullable();
            $table->text('subcategory_name')->nullable();
            $table->text('city_id')->nullable();
            $table->text('area_id')->nullable();
            $table->text('house_no')->nullable();
            $table->text('road_no')->nullable();
            $table->string('role')->default('user')->enum(['admin', 'vendor', 'user']);
            $table->string('status')->default('active')->enum(['active', 'inactive']);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
