<?php

namespace App\Http\Controllers;

use DB;
use Cart;
use Session;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function login_check()
    {
        return view('pages.login');
    }

    public function customer_registration(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->get('customer_name');
        $data['customer_email'] = $request->get('customer_email');
        $data['password'] = md5($request->get('password'));
        $data['mobile_number'] = $request->get('mobile_number');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $customer_id = DB::table('tbl_customer')
            ->insertGetId($data);
        
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->get('customer_name'));

        return redirect('/checkout');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function save_shipping(Request $request)
    {
        $data = array();

        $data['shipping_email'] = $request->get('shipping_email');
        $data['shipping_first_name'] = $request->get('shipping_first_name');
        $data['shipping_last_name'] = $request->get('shipping_last_name');
        $data['shipping_address'] = $request->get('shipping_address');
        $data['shipping_mobile_number'] = $request->get('shipping_mobile_number');
        $data['shipping_city'] = $request->get('shipping_city');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        
        $shipping_id = DB::table('tbl_shipping')
                        ->insertGetId($data);
       
        Session::put('shipping_id', $shipping_id);

        return redirect('/payment');
    }

    public function payment()
    {
        $all_category = DB::table('tbl_category')
                        ->where('publication_status', 1)
                        ->get();
        
        $contents = Cart::content();            

        return view('pages.payment', compact('contents'));
    }

    public function order_place(Request $request)
    {
        $payment_method = $request->get('payment_method');
        
        $payment_data = array();
        $payment_data['payment_method'] = $payment_method;
        $payment_data['payment_status'] = 'pending';
        $payment_data['payment_date_time'] = Carbon::now();
        $payment_id = DB::table('tbl_payment')
                    ->insertGetId($payment_data);

        $total = Cart::total();
        $order_data = array();
        $order_data['payment_id'] = $payment_id;
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['order_total'] = $total;
        $order_data['order_status'] = 'pending';
        $order_data['order_date_time'] = Carbon::now();

        $order_id = DB::table('tbl_order')
                    ->insertGetId($order_data);
        
        $contents = Cart::content();
        $order_detail_data = array();

        foreach($contents as $data) {
            $order_detail_data['order_id'] = $order_id;
            $order_detail_data['product_id'] = $data->id;
            $order_detail_data['product_name'] = $data->name;
            $order_detail_data['product_price'] = $data->price;
            $order_detail_data['product_sales_quality'] = $data->qty;
            $order_detail_id = DB::table('tbl_order_details')
                                ->insertGetId($order_detail_data);

        }

        if($payment_method == 'hand_cash') {
            Cart::destroy();
            return view('pages.hand_cash');
        }
        elseif ($payment_method == 'debit_cash') {
            echo "successfully by debit cash";
        }
        elseif($payment_method == 'paypal') {
            echo "successfully by paypal";
        }
        else {
            echo "no payment selected";
        }
        
    }

    public function manage_order()
    {
        $data_order = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
                    ->select('tbl_order.*', 'tbl_customer.customer_name')
                    ->get();

        // dd($data_order);
        return view('admin/order.manage_order', [
            'data_orders' => $data_order
        ]);
    }

    public function view_order($id)
    {
        // $order = DB::table('tbl_order')
        //         ->where('order_id', $id)
        //         ->first();
        
        $order_by = DB::table('tbl_order')
                    ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
                    ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
                    ->join('tbl_order_details', 'tbl_order.order_id', '=', 'tbl_order_details.order_id')
                    ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_details.*')
                    ->get();

        return view('admin/order.view_order', compact('order_by'));
    }

    public function customer_login(Request $request)
    {
        $customer_email = $request->get('customer_email');
        $password = md5($request->get('password'));
        
        $result = DB::table('tbl_customer')
                ->where('customer_email', $customer_email)
                ->where('password', $password)
                ->first();

        Session::put('customer_id', $result->customer_id);
        Session::put('customer_name', $result->customer_name);

        if($result) {
            return redirect('checkout')->with('status', 'Login successful!');
        }else {
            return redirect('login-check');
        }
    }

    public function customer_logout()
    {
        Session::flush();

        return redirect('/');
    }
}
