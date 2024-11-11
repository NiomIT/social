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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('subsubcategory_id')->nullable();
            $table->string('post_title_en')->nullable();
            $table->string('post_title_bn')->nullable();
            $table->string('post_slug');
            $table->string('post_tag_en')->nullable();
            $table->string('post_tag_bn')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_bn')->nullable();
            $table->string('post_thambnail');
            $table->string('vendor_id')->nullable();
            $table->string('map_url')->nullable();
            $table->string('advertisement_url')->nullable();
            $table->integer('hot_news')->nullable();
            $table->integer('featured_news')->nullable();
            $table->integer('trending_news')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->comment('1=>Active, 0=>Inactive');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
};
