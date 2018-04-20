<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetAdditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_additions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('asset_id');
            $table->string('title');
            $table->string('specification');
            $table->string('storage_place');
            $table->string('unit_price')->nullable();
            $table->bigInteger('amount')->default(0);
            $table->string('original_value')->nullable();
            $table->date('commissioning_date')->nullable();
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
        Schema::dropIfExists('asset_additions');
    }
}
