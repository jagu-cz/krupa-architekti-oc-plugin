<?php

namespace Jagu\KrupaArchitekti\Updates;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class AddTagsToProject extends Migration
{
    private const PROJECTS_TABLE = 'jagu_krupaarchitekti_projects';
    private const PROJECT_TAGS_TABLE = 'jagu_krupaarchitekti_project_tags';
    private const PROJECT_TAGS_TO_PROJECTS_TABLE = 'jagu_krupaarchitekti_project_tags_to_projects';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::PROJECT_TAGS_TABLE, function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
        });

        Schema::create(self::PROJECT_TAGS_TO_PROJECTS_TABLE, function (Blueprint $table) {
            $table->primary(['project_id', 'project_tag_id']);

            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on(self::PROJECTS_TABLE)->onDelete('cascade');

            $table->integer('project_tag_id')->unsigned();
            $table->foreign('project_tag_id')->references('id')->on(self::PROJECT_TAGS_TABLE)->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(self::PROJECT_TAGS_TO_PROJECTS_TABLE);
        Schema::dropIfExists(self::PROJECT_TAGS_TABLE);
    }
}