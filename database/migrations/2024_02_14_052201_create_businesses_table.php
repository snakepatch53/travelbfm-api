<?php

use App\Models\Business;
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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('short_description');
            $table->string('logo')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('location');
            $table->string('link');
            $table->enum('state', Business::$_STATES)->default(Business::$_STATES[0]);
            $table->foreignId('user_id')->constrained('users');
            // horarios | ini
            $table->string('monday_open')->default('08:00:00');
            $table->string('monday_close')->default('18:00:00');
            $table->string('tuesday_open')->default('08:00:00');
            $table->string('tuesday_close')->default('18:00:00');
            $table->string('wednesday_open')->default('08:00:00');
            $table->string('wednesday_close')->default('18:00:00');
            $table->string('thursday_open')->default('08:00:00');
            $table->string('thursday_close')->default('18:00:00');
            $table->string('friday_open')->default('08:00:00');
            $table->string('friday_close')->default('18:00:00');
            $table->string('saturday_open')->default('08:00:00');
            $table->string('saturday_close')->default('18:00:00');
            $table->string('sunday_open')->default('08:00:00');
            $table->string('sunday_close')->default('18:00:00');
            // horarios | fin
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
        Schema::dropIfExists('businesses');
    }
};
