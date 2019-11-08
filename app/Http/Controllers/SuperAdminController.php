<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    
    public function index() {
        $this->AdminAuthCheck();
        return view ('admin.dashboard');
    }

    public function logout()
    {
        // Session::put('admin_name', null);
        // Session::put('admin_id', null);
        Session::flush();
        return redirect('/admin');
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
