<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assettype_id')->nullable();
            $table->string('name')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('unit')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('vendor')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('description')->nullable();
            $table->string('invoice_image')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('ssd')->nullable();
            $table->string('hdd')->nullable();
            $table->string('last_maintenace_date')->nullable();
            $table->string('maintenace_due_date')->nullable();
            $table->string('created_user_id')->nullable();
            $table->string('updated_user_id')->nullable();
            $table->string('assigned_to')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('assigned_status')->default(0);
            $table->tinyInteger('maintenance_status')->default(0);
            $table->tinyInteger('upgrade_status')->default(0);
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
        Schema::dropIfExists('inventories');
    }
}
