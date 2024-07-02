<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domain');
            $table->string('database');
            $table->string('database_drive')->default('mysql');
            $table->string('database_username')->nullable();
            $table->string('database_password')->nullable();
            $table->date('subscription_period')->nullable();
            $table->enum('subscription_status',['active', 'not_active'])->default('not_active');
            $table->unique(['domain', 'database']);
            $table->timestamps();
        });
    }
};
