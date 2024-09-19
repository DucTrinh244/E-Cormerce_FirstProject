<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryProduct extends Controller
{


    public function Add_category_product()
    {
        return view('admin.add_category_product');
    }
    public function All_category_product()
    {
        return view('admin.all_category_product');
    }
}
