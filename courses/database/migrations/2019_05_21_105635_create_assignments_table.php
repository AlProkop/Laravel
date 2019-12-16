<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('assignment_id');
            $table->string('name');
            $table->string('description');
            $table->string('state');
            $table->string('create_date');
            $table->string('due_date');
            $table->integer('course_id_FK')->unsigned();
            
        });
        
        Schema::table('assignments', function (Blueprint $table) {
            $table->foreign('course_id_FK')
                ->references('course_id')->on('courses');    
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
            
        Schema::dropIfExists('assignments');
    }
}
