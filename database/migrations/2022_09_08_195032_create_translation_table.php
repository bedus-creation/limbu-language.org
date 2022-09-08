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
    public function up(): void
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->longText("english");
            $table->longText("limbu")->nullable();
            $table->longText("pronunciation")->nullable();
            $table->json("metadata")->nullable();
        });

        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId("user_id")->nullable()->constrained("users");
            $table->foreignId("translation_id")->constrained("translations");
            $table->integer("rating")->default(0);
            $table->longText("comment")->nullable();
            $table->json("metadata")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
        Schema::dropIfExists('translations');
    }
};
