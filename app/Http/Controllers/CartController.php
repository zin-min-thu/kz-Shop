<?php

namespace App\Http\Controllers;

use DB;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddToCart(Request $request)
    {
        $qty = $request->get('qty');
        $product_id = $request->get('product_id');

        $product_info = DB::table('tbl_products')
                        ->where('product_id', $product_id)
                        ->first();

        $data['id'] = $product_info->product_id;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        $data['qty'] = $qty;

        Cart::add($data);
        return redirect('/show-cart');
    }

    public function ShowCart()
    {
        $all_category = DB::table('tbl_category')
                        ->where('publication_status', 1)
                        ->get();
        
        $contents = Cart::content();
        
        return view('pages.add_to_cart', compact('all_category', 'contents'));
    }

    public function DeleteToCart($rowId)
    {
        Cart::update($rowId, 0);
        // Cart::remove($rowId);

        return redirect('/show-cart');
    }

    public function UpdateToCart(Request $request)
    {
        $qty = $request->get('qty');
        $rowId = $request->get('rowId');

        Cart::update($rowId, $qty);

        return redirect('/show-cart');
    }
}
