<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
                      
$table->string('title');
$table->longText('detail');
$table->integer('job_category')-> index();
 $table->bigInteger('user_id')->unsigned();
 $table -> foreign('user_id') -> references('id') -> on('users');
 $table->double('budget');
$table->string('required_skill');
$table->string('job_type');
$table->string('job_feature');
$table->string('attachment');
$table->date('deadline');
$table->string('status');

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
        Schema::dropIfExists('jobs');
    }
}
