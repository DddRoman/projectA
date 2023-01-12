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
        Schema::create('groups_dependense', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id');
            $table->foreignId('worker');
            $table->timestamps();
        });
        Schema::table('groups_dependense', static function (Blueprint $table): void {
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('worker')->references('id')->on('positions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups_dependense');
    }
};
