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
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
        });
    }

    public function down()
    {
        // If you need to rollback, you can drop the foreign key constraint here.
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
        });
    }
};
