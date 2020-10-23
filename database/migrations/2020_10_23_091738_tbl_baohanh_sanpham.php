<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBaohanhSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('tbl_baohanh_sanpham', function (Blueprint $table) {
            $table->increments('id',11)->unique();
            $table->string('serial',50)->nullable();
			$table->string('sanpham',250)->nullable();
			$table->integer('baohanh')->nullable();
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
        //
		Schema::drop('tbl_baohanh_sanpham');
    }
}
