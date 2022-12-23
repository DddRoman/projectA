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
        Schema::create('doc_version', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_id');
            $table->string('name');
            $table->string('shifr');
            $table->string('version');
            $table->string('year');
            $table->timestamps();
        });
        Schema::table('doc_version', static function (Blueprint $table): void {
            $table->foreign('doc_id')->references('id')->on('docs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_version');
    }
};
