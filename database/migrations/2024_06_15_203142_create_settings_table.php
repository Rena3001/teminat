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
            $table->string('address');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');

            $table->string('home_about_title');
            $table->string('time_line_title');
            $table->string('home_about_subtitle');
            $table->string('footer_title');
            $table->string('about_title');
            $table->string('about_iframe');
            $table->string('contact_title');
            $table->string('welding_title');
            $table->string('casting_title');
            $table->string('valve_title');

            $table->text('home_about_desc');
            $table->text('about_desc');
            $table->text('casting_desc');

            $table->string('image_logo_light');
            $table->string('image_logo_dark');
            $table->string('about_banner');
            $table->string('contact_image');
            $table->string('welding_image');
            $table->string('casting_image');
            $table->string('valve_image');

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
