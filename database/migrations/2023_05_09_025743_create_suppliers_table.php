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
        if (!Schema::hasTable('suppliers')) 
        {
            Schema::create('suppliers', function (Blueprint $table) {
                $table->id();
                $table->string('supplier_name',150)->nullable();
                $table->string('address')->nullable();
                $table->string('city',100)->nullable();
                $table->string('country',100)->nullable();
                $table->integer('zip_code')->nullable()->unsigned();
                $table->string('contact_name',150)->nullable();
                $table->string('contact_no',20)->unique();
                $table->text('remarks')->nullable();
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
