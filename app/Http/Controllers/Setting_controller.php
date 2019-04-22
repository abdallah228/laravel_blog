<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class Setting_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::first();
        return view('admin.setting.setting')->with('setting',$setting);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //

       $this->validate(request(),[

        'site_name'=>'required',
        'contact_email'=>'required',
        'contact_number'=>'required',
        'address'=>'required',
       ]);

       $setting = Setting::first();

       $setting->site_name = request()->site_name;
       $setting->contact_number = request()->contact_number;
       $setting->contact_email = request()->contact_email;
       $setting->address = request()->address;
       $setting->save();
       Session::flash('success','seeting updates succesfuly');
       return redirect()->back();
       

    }

    
}
