<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    // show view add brand product 
    public function Add_product()
    {
        return view('admin.add_product');
    }

    // show all brand product 
    public function All_product()
    {
        $all_product = DB::table('tbl_brand')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);

        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function Save_product(Request $request)
    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Thêm thương hiệu sản phẩm thành công !');
        return Redirect::to('add-product');
    }

    //set active and unactive for list brand 
    public function unactive_product($product_id)
    {
        DB::table('tbl_brand')->where('product_id', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Không kích hoạt thương hiệu sản phẩm thành công!');
        return Redirect::to('all-product');
    }
    public function active_product($product_id)
    {
        DB::table('tbl_brand')->where('product_id', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Kích hoạt thương hiệu sản phẩm thành công!');
        return Redirect::to('all-product');
    }
    public function Edit_product($product_id)
    {
        $edit_product = DB::table('tbl_brand')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product);

        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function Update_product($product_id, Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;

        DB::table('tbl_brand')->where('product_id', $product_id)->update($data);
        Session::put('message', 'Cập nhật thương hiệu thành công');
        return Redirect::to('all-product');
    }
    public function Delete_product($product_id)
    {
        DB::table('tbl_brand')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa thương hiệu sản phẩm thành công ');
        return Redirect::to('all-product');
    }
}
