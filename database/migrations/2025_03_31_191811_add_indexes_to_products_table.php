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
        Schema::table('products', function (Blueprint $table) {
            $table->index('id_prestashop'); // ✅ Γρήγορη αναζήτηση προϊόντων από id_prestashop
            $table->index('sku'); // ✅ Βελτίωση αναζήτησης με SKU
            $table->index('ean'); // ✅ Βελτίωση αναζήτησης με EAN
            $table->index('mpn'); // ✅ Βελτίωση αναζήτησης με MPN
            $table->index('price'); // ✅ Ταξινόμηση προϊόντων κατά τιμή
            $table->index('name'); // ✅ Επιτάχυνση LIKE '%search%'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['id_prestashop']);
            $table->dropIndex(['sku']);
            $table->dropIndex(['ean']);
            $table->dropIndex(['mpn']);
            $table->dropIndex(['price']);
            $table->dropIndex(['name']);
        });
    }
};
