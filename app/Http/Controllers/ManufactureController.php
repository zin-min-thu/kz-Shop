<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function index()
    { 
        $this->AdminAuthCheck();
        return view('admin/manufacture.add_manufacture');
    }

    public function store(Request $request)
    {
        $data = array();
        $data =[
            'manufacture_name' => $request->get('manufacture_name'),
            'manufacture_description' => $request->get('manufacture_description'),
            'publication_status' => $request->get('publication_status')
        ];

        DB::table('tbl_manufacture')->insert($data);

        Session::put('message', 'Added manufactuer successful!!');
        
        return redirect('/all-manufacture');

    }
    public function AllManufacture()
    {
        $this->AdminAuthCheck();
        $all_manufacture = DB::table('tbl_manufacture')->get();

        return view('admin/manufacture.all_manufacture', [
            'all_manufacture' => $all_manufacture
        ]);
    }
    public function edit($id)
    {
        $this->AdminAuthCheck();
        $manufacture = DB::table('tbl_manufacture')
                    ->where('manufacture_id', $id)
                    ->first();

        return view('admin/manufacture.edit_manufacture', [
            'manufacture' => $manufacture
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data = [
            'manufacture_name' => $request->get('manufacture_name'),
            'manufacture_description' => $request->get('manufacture_description')
        ];

        DB::table('tbl_manufacture')
            ->where('manufacture_id', $id)
            ->update($data);

        Session::put('message', 'Updated manufacture successfull!!');

        return redirect('/all-manufacture');
    }

    public function delete($id)
    {
        $this->AdminAuthCheck();
        DB::table('tbl_manufacture')->where('manufacture_id', $id)->delete();

        Session::put('message', 'Deleted manufacture successfull!!');

        return redirect('/all-manufacture');
    }
    public function Unactive($id)
    {   
        DB::table('tbl_manufacture')
            ->where('manufacture_id', $id)
            ->update(['publication_status' => 0]);

        Session::put('message', 'Unactive status successful!!');

        return redirect('/all-manufacture');
    }
    public function Active($id)
    {   
        // dd($id);
        DB::table('tbl_manufacture')
        ->where('manufacture_id', $id)
        ->update(['publication_status' => 1]);

        Session::put('message', 'Active status successful!!');
    
        return redirect('/all-manufacture');
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
