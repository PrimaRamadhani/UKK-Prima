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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('no_telepon');
            $table->string('pictures')->nullable();
            $table->string('bio')->nullable();
            $table->string('alamat')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        // TRIGGER REKAP INSERT USER
        DB::unprepared('
        CREATE TRIGGER trigger_user_insert
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            DECLARE alamat_value VARCHAR(255);

            -- Set alamat_value ke nilai alamat dari NEW atau KOSONGIN jika NULL
            SET alamat_value = COALESCE(NEW.alamat, "");

            INSERT INTO log_users (user_id, action, username, email, alamat, no_telepon, keterangan, created_at, updated_at)
            VALUES (NEW.id, "INSERT", NEW.username, NEW.email, alamat_value, NEW.no_telepon, "", NOW(), NOW());
        END;
    ');

    //TRIGGER REKAP UPDATE USER
    DB::unprepared('
    CREATE TRIGGER trigger_user_update
    AFTER UPDATE ON users
    FOR EACH ROW
    BEGIN
        INSERT INTO log_users (user_id, action, username, email, alamat, no_telepon, keterangan, created_at, updated_at)
        VALUES (NEW.id, "UPDATE", NEW.username, NEW.email, NEW.alamat, NEW.no_telepon, "", NOW(), NOW());
    END;
');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
