<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        DB::statement("ALTER TABLE items MODIFY details LONGTEXT NULL;");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE items MODIFY details LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL CHECK (json_valid(`details`));");
    }
};
