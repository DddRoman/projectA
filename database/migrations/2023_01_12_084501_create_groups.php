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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ind_id');
            $table->foreignId('chief_position');
            $table->timestamps();
        });
        Schema::table('groups', static function (Blueprint $table): void {
            $table->foreign('ind_id')->references('id')->on('industria')->onDelete('cascade');
            $table->foreign('chief_position')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
};
