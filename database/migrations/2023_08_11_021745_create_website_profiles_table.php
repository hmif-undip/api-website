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
        Schema::create('website_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->dateTime('modified_date')->nullable();
            $table->string('website_name')->nullable();
            $table->string('tagline')->nullable();
            $table->string('keyword')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('url')->nullable();
            $table->string('email')->nullable();
            $table->text('hp')->nullable();
            $table->text('address')->nullable();
            $table->text('map')->nullable();
            $table->year("year_now")->nullable()->default(date('Y'));
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_profiles');
    }
};
