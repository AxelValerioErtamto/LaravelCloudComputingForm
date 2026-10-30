<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Not unique on purpose: the same address may register more than once (e.g. when testing).
            $table->string('email')->index();
            $table->string('password');            // stored hashed, never in plain text
            $table->date('birthdate');
            $table->string('token', 64)->unique(); // used in the "Confirm My Registration" link
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
