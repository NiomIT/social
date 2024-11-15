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
        Schema::create('advertisements', function (Blueprint $table) {
         
                $table->id();
                $table->text('url')->nullable();
                $table->string('box_size')->nullable();
                $table->string('non_box_size')->nullable();
                $table->unsignedTinyInteger('status')->default(1)->comment('1=>Active, 0=>Inactive');
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
        Schema::dropIfExists('advertisements');
    }
};
