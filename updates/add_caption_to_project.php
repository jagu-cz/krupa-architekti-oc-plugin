<?php

namespace Jagu\KrupaArchitekti\Updates;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddCaptionToProject extends Migration
{
    private const PROJECTS_TABLE = 'jagu_krupaarchitekti_projects';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(self::PROJECTS_TABLE, function (Blueprint $table) {
            $table->string('caption')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(self::PROJECTS_TABLE, function (Blueprint $table) {
            $table->dropColumn('caption');
        });
    }
}