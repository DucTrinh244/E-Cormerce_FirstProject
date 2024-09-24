<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Nhập lớp Request
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class CartController extends Controller
{
    public function Save_cart(Request $request) // Định nghĩa phương thức Save_cart với đối tượng Request
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        $product_id = $request->productid_hidden;
        $quantity = $request->qty;

        // Lấy thông tin sản phẩm từ database
        $data = DB::table('tbl_product')->where('product_id', $product_id)->get();

        return view('pages.cart.show_cart')
            ->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
}
