<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('asset_id')->unique();
            $table->bigInteger('category_id');
            $table->string('number');
            $table->string('title');
            $table->string('supply')->nullable();
            $table->string('original_value')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('commissioning_date')->nullable();
            $table->string('durable_year')->nullable();
            $table->bigInteger('department_id')->default(0);
            $table->bigInteger('department_keeper_id')->default(0);
            $table->bigInteger('user_id')->default(0);
            $table->bigInteger('user_keeper_id')->default(0);
            $table->string('storage_place')->nullable();
            $table->string('specification')->nullable();
            $table->string('source')->nullable();
            $table->string('unit')->nullable();
            $table->string('deprecition')->nullable();
            $table->string('deprecition_year')->nullable();
            $table->string('deprecition_rate')->nullable();
            $table->string('deprecition_monthly')->nullable();
            $table->string('worth')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('purpose')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('assets');
    }
}
