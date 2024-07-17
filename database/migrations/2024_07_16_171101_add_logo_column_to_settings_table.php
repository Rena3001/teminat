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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('logo_dark')->default('/client/assets/images/logo/logo_dark.png')->after('contact_image');
            $table->string('logo_light')->default('/client/assets/images/logo/logo_light.png')->after('contact_image');
            $table->string('favicon')->default('/client/assets/images/favicon.ico')->after('contact_image');
            $table->text('iframe_map')->default('<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d737.8638179382419!2d49.83870372851556!3d40.397872498207725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d7b10b31bbf%3A0xb8a84dda46c78a5!2sADAS%2F%20Azerbaijan%20Digital%20Arts%20School!5e1!3m2!1str!2saz!4v1720423635494!5m2!1str!2saz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>')->after('contact_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            // Check if the column exists before dropping it
            if (Schema::hasColumn('settings', 'logo_dark')) {
                $table->dropColumn('logo_dark');
            }
            if (Schema::hasColumn('settings', 'logo_light')) {
                $table->dropColumn('logo_light');
            }
            if (Schema::hasColumn('settings', 'favicon')) {
                $table->dropColumn('favicon');
            }
            if (Schema::hasColumn('settings', 'iframe_map')) {
                $table->dropColumn('iframe_map');
            }
        });
    }
};
