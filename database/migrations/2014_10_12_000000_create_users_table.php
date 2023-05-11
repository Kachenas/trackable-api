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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',150)->nullable();
            $table->string('middle_name',150)->nullable();
            $table->string('last_name',150)->nullable();
            $table->date('birthdate',150)->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->string('city',100)->nullable();
            $table->string('country',100)->nullable();
            $table->integer('zip_code')->nullable()->unsigned();
            $table->string('contact_no',20)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
