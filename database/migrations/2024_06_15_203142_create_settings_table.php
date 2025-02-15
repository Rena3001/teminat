<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('fb');
            $table->string('tw');
            $table->string('in');
            $table->string('inst');
            $table->string('yt');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->text('iframe_map');


            $table->string('address');
            $table->string('home_about_title');
            $table->string('home_banner');
            $table->string('home_banner2');
            $table->string('home_banner3');
            $table->string('home_banner4');
            $table->string('home_banner5');

            $table->string('home_about_subtitle');
            $table->string('footer_title');
            $table->string('about_title');
            $table->string('about_iframe');
            $table->string('contact_title');
            $table->string('categories_title');

            $table->text('home_about_desc');
            $table->text('about_desc');

            $table->string('image_logo_light');
            $table->string('image_logo_dark');
            $table->string('logo_dark');
            $table->string('logo_light');
            $table->string('favicon');
            $table->string('about_banner');
            $table->string('contact_image');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
