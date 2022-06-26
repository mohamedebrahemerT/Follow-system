<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingsController extends Controller
{

    public function __construct() {
           
         

          $this->middleware('AdminRole:Settings_show', [
            'only' => ['index', 'show'],
        ]);
         
        $this->middleware('AdminRole:Settings_edit', [
            'only' => ['edit', 'update'],
        ]);
         
        
        
    }
    public function edit()
    {
         $Settings = Setting::first();
        return view('admin.Settings.edit', compact('Settings'));

    }

    public function update(Request $request)
    {

        //return request();
        $data = $this->validate(\request(),
            [
                 
                        'name'=>'required',
                        'logo'=>'sometimes|nullable',
                        'Fivacon'=>'sometimes|nullable',

                        
                        'phone'=>'required',
                        'email'=>'required',
                        'address'=>'required',
                        'facebook_link'=>'sometimes|nullable',
                        'twitter_link'=>'sometimes|nullable',
                        'linkedin_link'=>'sometimes|nullable',
                        'copy_right'=>'required',
                        'about_title'=>'required',
                        'about_desc'=>'required',
                        'about_img'=>'sometimes|nullable',
                        


            ]);

        

        if ($request->Fivacon) {

            $imageName = time() . '.' . $request->Fivacon->extension();
            $request->Fivacon->move(public_path('/Setting'), $imageName);
            $data['Fivacon'] = 'Setting/'.$imageName;
        }

         if ($request->logo) {

            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('/Setting'), $imageName);
            $data['logo'] = 'Setting/'.$imageName;
        }
     
 


  if ($request->about_img) {

            $imageName = time() . '.' . $request->about_img->extension();
            $request->about_img->move(public_path('/Setting'), $imageName);
            $data['about_img'] = 'Setting/'.$imageName;
        }



        Setting::first()->update($data);
        session()->flash('success', trans('trans.updatSuccess'));
        return redirect()->back();
    }
}
