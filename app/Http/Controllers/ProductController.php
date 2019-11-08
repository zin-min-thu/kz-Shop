<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin/product.add_product');
    }

    public function store(Request $request)
    {
        $data = array();
        $data = [
            'product_name' => $request->get('product_name'),
            'category_id' => $request->get('category_id'),
            'manufacture_id' => $request->get('manufacture_id'),
            'product_short_description' => $request->get('product_short_description'),
            'product_long_description' => $request->get('product_long_description'),
            'product_price' => $request->get('product_price'),
            'product_size' => $request->get('product_size'),
            'product_color' => $request->get('product_color'),
            'publication_status' => $request->get('publication_status')
        ];

        $image = $request->product_image;

        if($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.'.$ext;
            $upload_path = 'image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success) {
                $data['product_image'] = $image_url;

                DB::table('tbl_products')->insert($data);
                Session::put('message', 'Added Product successful!!');
                return redirect('/add-product');
            }

            $data['product_image']='';

            DB::table('tbl_products')->insert($data);
            Session::put('message', 'Added product successful!!');
            return redirect('/add-product');
        }
    }

    public function AllProduct()
    {
        $this->AdminAuthCheck();
        $all_product = DB::table('tbl_products')
                    ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
                    ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                    ->get();
        
        return view('admin/product.all_product', compact('all_product'));
    }

    public function edit($id)
    {
        $this->AdminAuthCheck();
        $products = DB::table('tbl_products')
                    ->where('product_id', $id)
                    ->get();
        
        return view('admin/product.edit_product');
    }
    public function UnActive($id) 
    {
        DB::table('tbl_products')
            ->where('product_id', $id)
            ->update(['publication_status'=> 0]);

        
        Session::put('message', "Unactive Product successful!!");
        return redirect('/all-product');

    }

    public function Active($id)
    {
        DB::table('tbl_products')
            ->where('product_id', $id)
            ->update(['publication_status'=> 1]);

        Session::put('message', 'Active product successful!!');
        return redirect('/all-product');
    }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return;
        }
        else {
            return redirect('/admin')->send();
        }
    }
}
