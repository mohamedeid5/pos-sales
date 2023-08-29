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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('account_types_id')->constrained();
            $table->foreignId('parent_account_id')->nullable()->constrained('accounts');
            $table->tinyInteger('is_parent')->default(0);
            $table->integer('account_number');
            $table->decimal('start_balance');
            $table->decimal('start_balance_status')->comment('1-balance 2-credit 3-debit');
            $table->decimal('current_balance');
            $table->integer('other_table_fk');
            $table->string('notes');
            $table->tinyInteger('is_archived')->default(0);
            $table->foreignId('added_by')->constrained('admins');
            $table->foreignId('updated_by')->constrained('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
