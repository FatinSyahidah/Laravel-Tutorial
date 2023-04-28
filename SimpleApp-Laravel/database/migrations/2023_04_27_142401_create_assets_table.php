<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('asset_id');
            $table->integer('vendor_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('asset_no', 255)->unique()->nullable();
            $table->string('service', 255)->nullable();
            $table->string('asset_class', 255)->nullable();
            $table->string('type_code', 255)->nullable();
            $table->string('type_name', 255)->nullable();
            $table->string('task_code', 255)->nullable();
            $table->string('taskcode_3', 255)->nullable();
            $table->string('frequency', 255)->nullable();
            $table->string('desc', 255)->nullable();
            $table->string('item_code', 255)->nullable();
            $table->string('item_name', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->string('serial_no', 255)->nullable();
            $table->string('manufacturer', 255)->nullable();
            $table->string('dept', 255)->nullable();
            $table->string('depart_name', 255)->nullable();
            $table->string('area_code', 255)->nullable();
            $table->string('area_name', 255)->nullable();
            $table->string('location_code', 255)->nullable();
            $table->string('location_name', 255)->nullable();
            $table->string('remark', 255)->nullable();
            $table->string('purc_cost', 255)->nullable();
            $table->string('work_group', 255)->nullable();
            $table->string('group', 255)->nullable();
            $table->string('package', 255)->nullable();
            $table->string('package_desc', 255)->nullable();
            $table->string('updateasset', 255)->nullable();
            $table->string('pic', 255)->nullable();
            $table->string('createdate', 255)->nullable();
            $table->integer('createby')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
};
