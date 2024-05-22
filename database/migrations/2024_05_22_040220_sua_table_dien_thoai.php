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
        Schema::table('dienthoai', function (Blueprint $table) {
            $table->text('baiViet')->nullable(); // thêm field baiViet (text, nullable)
            $table->string('ghiChu', 500)->nullable(); // thêm field ghiChu (string, 500, nullable)
            $table->unsignedBigInteger('idLoai'); // thêm field idLoai (unsigned Big Integer)
            $table->decimal('gia', 15, 2)->change(); // thay đổi kiểu dữ liệu của cột gia
            // Khai báo khóa ngoại cho idLoai liên kết với bảng loaiSP
            $table->foreign('idLoai')->references('id')->on('loaiSP')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dienthoai', function (Blueprint $table) {
            // Xóa khóa ngoại trước khi xóa cột
            $table->dropForeign(['idLoai']);
            $table->decimal('gia', 8, 2)->change(); // Thay đổi lại kiểu dữ liệu về như cũ
            // Xóa các cột
            $table->dropColumn('baiViet');
            $table->dropColumn('ghiChu');
            $table->dropColumn('idLoai');
        });
    }
};
