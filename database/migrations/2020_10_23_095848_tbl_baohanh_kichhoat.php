<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBaohanhKichhoat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('tbl_baohanh_kichhoat', function (Blueprint $table) {
            $table->increments('idbaohanh',11)->unique();
            $table->string('serial',50)->nullable();
			$table->string('hoten',100)->nullable();
			$table->string('dienthoai',20)->nullable();
			$table->string('diachi',250)->nullable();
			$table->string('email',100)->nullable();
			$table->integer('baohanhtu')->nullable();
			$table->integer('baohanhden')->nullable();
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
		Schema::drop('tbl_baohanh_kichhoat');
    }
}
