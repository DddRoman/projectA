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
        Schema::create('doc_text', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doc_version_id');
            $table->integer('type');
            $table->integer('dependence');
            $table->integer('prioritete');
            $table->text('text');
            $table->boolean('draft');
            $table->timestamps();
        });
        Schema::table('doc_text', static function (Blueprint $table): void {
            $table->foreign('doc_version_id')->references('id')->on('doc_version')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_text');
    }
};
