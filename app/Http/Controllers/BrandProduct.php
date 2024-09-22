<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class BrandProduct extends Controller
{

    // show view add brand product 
    public function Add_brand_product()
    {
        return view('admin.add_brand_product');
    }

    // show all brand product 
    public function All_brand_product()
    {
        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);

        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }

    public function Save_brand_product(Request $request)
    {

        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công !');
        return Redirect::to('add-brand-product');
    }

    //set active and unactive for list brand 
    public function unactive_brand_product($brand_product_id)
    {
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status' => 1]);
        Session::put('message', 'Không kích hoạt thương hiệu sản phẩm thành công!');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id)
    {
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update(['brand_status' => 0]);
        Session::put('message', 'Kích hoạt thương hiệu sản phẩm thành công!');
        return Redirect::to('all-brand-product');
    }
    public function Edit_brand_product($brand_product_id)
    {
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id', $brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);

        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    public function Update_brand_product($brand_product_id, Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;

        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu thành công');
        return Redirect::to('all-brand-product');
    }
    public function Delete_brand_product($brand_product_id)
    {
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)->delete();
        Session::put('message', 'Xóa thương hiệu sản phẩm thành công ');
        return Redirect::to('all-brand-product');
    }
}
