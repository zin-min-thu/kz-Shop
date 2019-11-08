<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin/category.add_category');
    }

    public function store(Request $request)
    {
        $data = array();
        $data['category_id'] = $request->get('category_id');
        $data['category_name'] = $request->get('category_name');
        $data['category_description'] = $request->get('category_description');
        $data['publication_status'] = $request->get('publication_status');

        // print_r($data);
        $query = DB::table('tbl_category')->insert($data);

        Session::put('message', 'Successfully Category Added!!');
        return redirect('/all-category');


    }

    public function AllCategory()
    {
        $this->AdminAuthCheck();
        $categories = DB::table('tbl_category')->get();
    
        return view('admin/category.all_category', [
            'categories' => $categories
        ]);
    }

    public function edit($id) 
    {
        $this->AdminAuthCheck();
        $category = DB::table('tbl_category')
                    ->where('category_id', $id)->first();
        
        return view('admin/category.edit_category', [
            'category' => $category
        ]);
        
    }

    public function update(Request $request, $id)
    {
        $data = array();
        $data['category_name'] = $request->get('category_name');
        $data['category_description'] = $request->get('category_description');

        $query = DB::table('tbl_category')
                ->where('category_id', $id)
                ->update($data);

         
        Session::put('message', 'Updated Category successful!!');
        return redirect('/all-category');
          
    }

    public function delete($id) 
    {
        $this->AdminAuthCheck();
        DB::table('tbl_category')->where('category_id', $id)->delete();
        Session::put('message', 'Deleted Category successful!!');
        return redirect('/all-category');
    }

    public function UnActive($id) 
    {
        $query = DB::table('tbl_category')
                ->where('category_id', $id)
                ->update(['publication_status' =>0]);
        
            if($query) {
            Session::put('message', 'Unactive Category successful!!');
            return redirect('/all-category');
        }
    }
    public function Active($id) 
    {
        $query = DB::table('tbl_category')
                ->where('category_id', $id)
                ->update(['publication_status' => 1]);
        
        if($query) {
            Session::put('message', 'Active Category successful!!');
            return redirect('/all-category');
        }
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
