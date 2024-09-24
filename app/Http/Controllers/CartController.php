<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Nhập lớp Request
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;


session_start();

class CartController extends Controller
{
    public function Save_cart(Request $request) // Định nghĩa phương thức Save_cart với đối tượng Request
    {

        $product_id = $request->productid_hidden;
        $quantity = $request->qty;

        // Lấy thông tin sản phẩm từ database
        $product_info = DB::table('tbl_product')->where('product_id', $product_id)->first();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;

        Cart::add($data);

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);

        return  Redirect::to('/show-cart');
    }
    public function show_cart()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        return view('pages.cart.show_cart')
            ->with('category', $cate_product)
            ->with('brand', $brand_product);
    }
}
