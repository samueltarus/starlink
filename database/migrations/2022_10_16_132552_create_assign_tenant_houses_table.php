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
        Schema::create('assign_tenant_houses', function (Blueprint $table) {
            $table->id();
            $table->string('apartment_name');
            $table->string('house_name');
            $table->string('montly_rent');
            $table->string('tenant_id');
            $table->string('tenant_name');
            $table->string('deposit_amount');
            $table->string('placement_date');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_tenant_houses');
    }
};
