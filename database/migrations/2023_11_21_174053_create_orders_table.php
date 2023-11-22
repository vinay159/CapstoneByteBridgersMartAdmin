<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('order_id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->text('address');
            $table->integer('payment_id')->nullable()->default(null)->index();
            $table->enum('payment_status', ['INITIATED', 'IN_PROCESS', 'FAILED', 'SUCCESS'])->default('INITIATED');
            $table->dateTime('payment_date')->nullable()->default(null);
            $table->string('tracking_no')->nullable()->default(null);
            $table->dateTime('delivery_date')->nullable()->default(null);
            $table->enum('status', ['INITIATED', 'ACCEPTED', 'DISPATCHED', 'DELIVERED', 'CANCELLED'])->default('INITIATED');
            $table->decimal('total_price');
            $table->decimal('final_price');
            $table->timestamps();
        });
    }
};
