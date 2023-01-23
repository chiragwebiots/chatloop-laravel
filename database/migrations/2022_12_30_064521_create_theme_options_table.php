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
        Schema::create('theme_options', function (Blueprint $table) {
            $table->id();
            $table->string('primary_color',191)->nullable();
            $table->string('secondary_color',191)->nullable();            
            $table->string('copyright',191)->nullable();
            $table->string('language')->nullable();
            $table->string('meta_title',191)->nullable();
            $table->string('meta_description',255)->nullable();
            $table->string('meta_keywords',255)->nullable();            
            $table->string('meta_author_name',191)->nullable();
            $table->string('meta_image',191)->nullable();
            $table->string('favic_icon',191)->nullable();
            $table->string('site_logo',191)->nullable();
            $table->boolean('required_name_email')->nullable();
            $table->boolean('required_login')->nullable();
            $table->boolean('comment_approved')->nullable(); 
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
        Schema::dropIfExists('theme_options');
    }
};
