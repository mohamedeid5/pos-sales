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
        Schema::create('item_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('item_code')->nullable();
            $table->string('name');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('item_type')->comment('واحد مخزني - اتنين استهلاكي - تلاتة عهدة');
            $table->foreignId('item_categories_id')->constrained();
            $table->foreignId('parent_item_card_id')->nullable()->constrained('item_cards');
            $table->decimal('quantity', 10, 3)->nullable();
            $table->decimal('retail_quantity', 10, 3)->nullable()->comment('كمية النجزئة المتبقية من الوحدة الاب في حالة وجود وحدة تجزئة للصنف');
            $table->decimal('all_retails_quantity', 10, 3)->nullable()->comment('كل الكمية محولة بوحدة التجزئة');
            $table->tinyInteger('has_fixed_price')->nullable()->default(0);
            $table->tinyInteger('has_retailunit')->comment('هل للصنف وحدة تجزئة');
            $table->foreignId('uom_id')->constrained();
            $table->foreignId('retail_uom_id')->nullable()->constrained('uoms');
            $table->decimal('retail_uom_quantity_to_parent', 10, 2)->nullable();
            $table->string('barcode');
            $table->decimal('price', 10, 2)->comment('السعر القطاعي بوحدة القياس الاساسية')->nullable();
            $table->decimal('wholesale_price', 10, 2)->comment('السعر الجملة لوحدة القياس الاساسية');
            $table->decimal('half_wholesale_price', 10, 2)->comment('سعر النصف جملة قطاعي لوحدة القياس الاساسية');
            $table->decimal('retail_price', 10, 2)->comment('السعر القطاعي لوحدة التجزئة')->nullable();
            $table->decimal('half_wholesale_retail_price', 10, 2)->comment('سعر النصف جملة قطاعي مع وحدة التجزئة')->nullable();
            $table->decimal('wholesale_price_retail', 10, 2)->nullable()->comment('سعر الجملة لوحدة قياس التجزئة');
            $table->decimal('cost_price', 10, 2)->comment('سعر التكلفة');
            $table->decimal('retail_cost_price', 10, 2)->comment('متوسط التكلفة للصنف بوحدة قياس التجزئة')->nullable();
            $table->foreignId('added_by')->constrained('admins');
            $table->foreignId('updated_by')->nullable()->constrained('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_cards');
    }
};
