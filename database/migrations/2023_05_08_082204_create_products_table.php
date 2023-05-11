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
        if (!Schema::hasTable('products'))
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->integer('supplier_id')->nullable()->unsigned();
                $table->string('product_name',100)->nullable(false);
                $table->decimal('product_price',20,2)->default(0);
                $table->integer('quantity')->nullable()->unsigned()->default(0);
                $table->string('product_status',20)->default('Active');
                $table->timestamps();
            });
        }
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
