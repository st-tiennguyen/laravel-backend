<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('type');
            $table->integer('status');
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->unsignedBigInteger('assignee');
            //$table->bigInteger('assignee')->unsigned()->nullable();


            $table->foreign('assignee')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('estimate');
            $table->decimal('actual');
            //$table->timestamp('created_at');
            //$table->timestamps('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->timestamps();
            $table->softDeletes(); 
        });

        // Schema::table('tasks', function(Blueprint $table) {
        //    // $table->foreign('assignee')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('assignee')->references('id')->on('users');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
