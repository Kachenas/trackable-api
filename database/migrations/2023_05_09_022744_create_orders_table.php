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
        if (!Schema::hasTable('orders'))
        {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->integer('customer_id')->nullable()->unsigned();
                $table->string('order_name',100)->nullable();
                $table->integer('order_quantity')->nullable()->unsigned();
                $table->decimal('order_price',20,2)->default(0);
                $table->integer('order_discount')->nullable()->unsigned();
                $table->integer('order_total')->nullable()->unsigned();
                $table->datetime('order_date')->nullable();
                $table->string('payment_status',50)->nullable();
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
        Schema::dropIfExists('orders');
    }
};
