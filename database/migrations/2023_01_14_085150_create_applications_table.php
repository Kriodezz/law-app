<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->string('image')->nullable();
            $table->unsignedSmallInteger('status')->default(1)->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('client');
            $table->unsignedBigInteger('lawyer')->nullable();
            $table->text('answer')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('client', 'applications_client_idx');
            $table->foreign('client')->on('users')->references('id');
            $table->index('lawyer', 'applications_lawyer_idx');
            $table->foreign('lawyer')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
