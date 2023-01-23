<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('site_name')->nullable();
            $table->text('site_tagline')->nullable();
            $table->string('site_url', 191)->nullable();
            $table->string('administration_email', 191)->nullable();
            $table->string('timezone', 191)->nullable();
            $table->string('display_homepage', 191)->nullable();
            $table->string('homepage', 191)->nullable();
            $table->string('postpage', 191)->nullable();
            $table->integer('post_show')->nullable();
            $table->string('page_base', 191)->nullable();
            $table->string('post_base', 191)->nullable();
            $table->string('category_base', 191)->nullable();
            $table->string('tag_base', 191)->nullable();
            $table->string('mail_transport',191)->default('smtp');
            $table->string('mail_host',191)->nullable();
            $table->integer('mail_port')->nullable();
            $table->string('mail_encryption',191)->nullable();
            $table->string('mail_username',191)->nullable();
            $table->string('mail_password',191)->nullable();
            $table->string('mail_from_address',191)->nullable();
            $table->string('mail_from_name',191)->nullable();
            $table->string('google_analytics',191)->nullable();
            $table->string('facebook_pixel',191)->nullable();
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
        Schema::dropIfExists('settings');
    }
}
