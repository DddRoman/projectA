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
        Schema::create('doc_verification', function (Blueprint $table) {
            $table->id();
            $table->integer('doc_version_id');
            $table->integer('action'); // 1 утверждение  2- визирование 3- ознакомлен - 4 просмотрен  0 требует внимание
            $table->integer('user_id');
            $table->timestamps();
        });
        Schema::table('doc_verification', static function (Blueprint $table): void {
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
        Schema::dropIfExists('doc_verification');
    }
};
