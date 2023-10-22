<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('items', function (Blueprint $table) {
        //     $table->id();
        //     $table->bigInteger('user_id')->unsigned();
        //     $table->string('name', 100);
        //     $table->smallInteger('type_id')->nullable();
        //     $table->string('detail', 500)->nullable();
        //     $table->timestamps();
    
        //     // 外部キー制約
        //         // $table->foreign('user_id')->references('id')->on('users');
        //     // type_idに外部キーを追加する場合
        //         // $table->foreign('type_id')->references('id')->on('types');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('items');
    }
};
