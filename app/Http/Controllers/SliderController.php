<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin/slider.add_slider');
    }

    public function store(Request $request)
    {
        $data = array();
        $data = [
            'publication_status' => $request->get('publication_status')
        ];

        $image = $request->slider_image;

        if($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.'.$ext;
            $upload_path = 'slider/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success) {
                $data['slider_image'] = $image_url;

                DB::table('tbl_slider')->insert($data);
                Session::put('message', 'Added Slider Image successful!!');
                return redirect('/add-slider');
            }

            $data['slider_image']='';

            DB::table('tbl_slider')->insert($data);
            Session::put('message', 'Added slider image successful!!');
            return redirect('/all-slider');
        }
    }

    public function AllSlider()
    {
        $all_slider = DB::table('tbl_slider')->get();

        return view('admin/slider.all_slider', compact('all_slider'));
    }

    public function UnActive($id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $id)
            ->update(['publication_status'=> 0]);
        
        Session::put('message', 'Unactive slider successful!!');
        return redirect('/all-slider');
    }

    public function Active($id)
    {
        DB::table('tbl_slider')
            ->where('slider_id', $id)
            ->update(['publication_status'=> 1]);
        
        Session::put('message', 'Active slider successful!!');
        return redirect('/all-slider');
    }

    public function delete($id)
    {
        DB::table('tbl_slider')->where('slider_id', $id)->delete();

        Session::put('message', 'Deleted slider successful!');

        return redirect('/all-slider');
    }
}
