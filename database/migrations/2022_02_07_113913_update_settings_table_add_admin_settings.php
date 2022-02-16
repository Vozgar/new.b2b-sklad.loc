<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingsTableAddAdminSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('settings', 'admin_settings')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->json('admin_settings')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('settings', 'admin_settings')) {
            Schema::table('settings', function (Blueprint $table) {
                $table->dropColumn('admin_settings');
            });
        }
    }
}
