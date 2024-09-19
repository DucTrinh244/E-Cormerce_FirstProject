<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CategoryProduct extends Controller
{


    // show view add category product 
    public function Add_category_product()
    {
        return view('admin.add_category_product');
    }

    // show all category product 
    public function All_category_product()
    {
        return view('admin.all_category_product');
    }

    public function Save_category_product(Request $request)
    {

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công !');
        return Redirect::to('add-category-product');
    }
}
