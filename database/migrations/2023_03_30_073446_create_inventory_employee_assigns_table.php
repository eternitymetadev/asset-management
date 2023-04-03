<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryEmployeeAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_employee_assigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inventory_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('location_id')->nullable();
            $table->integer('qty')->nullable();
            $table->string('date_assigned')->nullable();
            $table->string('remarks')->nullable();
            $table->string('user_id')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('inventory_employee_assigns');
    }
}
