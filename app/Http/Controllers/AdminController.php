<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function index() {
        return view('admin_login');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->get('admin_email');
        $admin_password = md5($request->get('admin_password'));
        // return $admin_password;
        $query = DB::table('tbl_admin')
                ->where('admin_email', $admin_email)
                ->where('admin_password', $admin_password)
                ->first();

                // dd($query);
        if($query) {
            Session::put('admin_name', $query->admin_name);
            Session::put('admin_id', $query->admin_id);
            return redirect('/dashboard');
        }else {
            Session::put('message', "Email or Password Invalid");
            return redirect('/admin');
        }
    }
}
