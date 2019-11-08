<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

        $all_product = DB::table('tbl_products')
                        ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
                        ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=','tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*', 'tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->where('tbl_products.publication_status', 1)
                        ->get();

        return view('pages.home_content', compact('all_product'));
    }

    public function ProductByCategory($id) {

        $product_by_category = DB::table('tbl_products')
                            ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                            ->select('tbl_products.*')
                            ->where('tbl_category.category_id', $id)
                            ->where('tbl_products.publication_status', 1)
                            ->limit(18)
                            ->get();
        
       return view('/pages.product_by_category',[
            'product_by_category' => $product_by_category
        ]);
    }

    public function ProductByManufacture($id) {

        $product_by_manufacture = DB::table('tbl_products')
                                ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                                ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
                                ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                                ->where('tbl_products.publication_status', 1)
                                ->where('tbl_manufacture.manufacture_id', $id)
                                ->limit(18)
                                ->get();

        return view('/pages.product_by_manufacture', compact('product_by_manufacture'));
    }

    public function ViewProductDetail($id)
    {
        $product_detail = DB::table('tbl_products')
                        ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
                        ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
                        ->select('tbl_products.*', 'tbl_category.category_name','tbl_manufacture.manufacture_name')
                        ->where('tbl_products.publication_status',1)
                        ->where('tbl_products.product_id', $id)
                        ->first();
        // dd($product_detail);
        return view('pages.view_product_detail', compact('product_detail'));
    }
}
