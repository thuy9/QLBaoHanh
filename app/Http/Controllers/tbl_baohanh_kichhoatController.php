<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_baohanh_kichhoat;
use App\Models\tbl_baohanh_sanpham;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\JsonResponse;
use Exception;

class tbl_baohanh_kichhoatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		return view('hello');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {		
		try {
			//insert
			$sanpham=new tbl_baohanh_kichhoat;
			$sanpham->serial=$request->input("serial");
			$sanpham->hoten=$request->input("name");
			$sanpham->dienthoai=$request->input("phone");
			$sanpham->diachi=$request->input("address");
			$sanpham->email=$request->input("email");
			$mytime = Carbon::now();
			$sanpham->baohanhtu= strtotime($mytime->format('Y-m-d'));		
			$baohanh=DB::table('tbl_baohanh_sanpham')->where('serial', $sanpham->serial)->first();
			if (!$baohanh)
			{
				throw new Exception("Error!!");
			}else{
				$baohanh=DB::table('tbl_baohanh_sanpham')->where('serial', $sanpham->serial)->first()->baohanh;	
			}			
			$sanpham->baohanhden=0;
			$month=Carbon::now()->month;
			$year=Carbon::now()->year;
			for($i=1;$i<=$baohanh;$i++){
				$month++;
				if($month== 4||$month==6||$month==9||$month==11){
					$sanpham->baohanhden=$sanpham->baohanhden+ 30*86400;
				}else if($month== 1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
					$sanpham->baohanhden=$sanpham->baohanhden+ 31*86400;
				}else if($month >12){
					$month=0;
					$year++;
					$sanpham->baohanhden=$sanpham->baohanhden+ 31*86400;
				}else if($month ==2&&$year%100 == 0&&$year%400 == 0){
					$sanpham->baohanhden=$sanpham->baohanhden+ 29*86400;
				}else if($month ==2&&($year%100 != 0||$year%400 != 0)){
					$sanpham->baohanhden=$sanpham->baohanhden+ 28*86400;
				}				
			}
			$sanpham->baohanhden=$sanpham->baohanhden+ $sanpham->baohanhtu;
			$sanpham->save();			
			$success='{
				"code": 200,
				"status": "success",
				"content": {
				"message":'.'"Kích hoạt bảo hành thành công. Sản phẩm được bảo hành '. $baohanh.' tháng từ ngày '. date("d/m/Y", $sanpham->baohanhtu).' đến ngày '.date("d/m/Y", $sanpham->baohanhden)				
				.'"}'.
			'}';
			return $success;             
		} catch (Exception $e) {
			echo "Message: " . $e->getMessage();
			$error='{
				"code": 9000,
				"status": "error",
				"content": {
				"error_message": "Mã serial sản phẩm không đúng"
				}
			}';
		return $error;
		}
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		try {
			//insert
			$sanpham=new tbl_baohanh_kichhoat;
			
			
			$mytime = Carbon::now();
			$sanpham->baohanhtu= strtotime($mytime->format('Y-m-d'));		
			$baohanh=DB::table('tbl_baohanh_sanpham')->where('serial', $id)->first();
			if (!$baohanh)
			{
				throw new Exception("Error!!");
			}else{
				$baohanh=DB::table('tbl_baohanh_sanpham')->where('serial', $id)->first()->baohanh;	
			}			
			$sanpham->baohanhden=0;
			$month=Carbon::now()->month;
			$year=Carbon::now()->year;
			for($i=1;$i<=$baohanh;$i++){
				$month++;
				if($month== 4||$month==6||$month==9||$month==11){
					$sanpham->baohanhden=$sanpham->baohanhden+ 30*86400;
				}else if($month== 1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
					$sanpham->baohanhden=$sanpham->baohanhden+ 31*86400;
				}else if($month >12){
					$month=0;
					$year++;
					$sanpham->baohanhden=$sanpham->baohanhden+ 31*86400;
				}else if($month ==2&&$year%100 == 0&&$year%400 == 0){
					$sanpham->baohanhden=$sanpham->baohanhden+ 29*86400;
				}else if($month ==2&&($year%100 != 0||$year%400 != 0)){
					$sanpham->baohanhden=$sanpham->baohanhden+ 28*86400;
				}				
			}
			$sanpham->baohanhden=$sanpham->baohanhden+ $sanpham->baohanhtu;
			$sanpham->save();			
			$success='{
				"code": 200,
				"status": "success",
				"content": {
				"serial":'.$id
				.'"}'.
			'}';
			return $success;             
		} catch (Exception $e) {
			echo "Message: " . $e->getMessage();
			$error='{
				"code": 9000,
				"status": "error",
				"content": {
				"error_message": "Mã serial sản phẩm không đúng"
				}
			}';
		return $error;
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
