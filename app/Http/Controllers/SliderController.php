<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Slider;
use Symfony\Component\Console\Input\Input;

class SliderController extends Controller
{
    //
    public function sliders(){
        $sliders=Slider::get();
        return view( 'admin.sliders')->with('sliders',$sliders);
    }
    public function addslider(){
        return view('admin.addslider');

    }
    public function saveslider(Request $request){


        $this->validate($request,[
           'description_one'=>'required',
           'description_two'=>'required',
           'slider_image'=>'image|nullable|max:1999'


                ]);

                if($request->hasFile('slider_image'))
                {
   
                    // 1 get file name
                   $fileNameWithText=$request->file('slider_image')->getClientOriginalName();
                    // dd($fileNameWithText);
                    //2 get file name
                   $fileName=pathinfo($fileNameWithText,PATHINFO_FILENAME);
                   //3 get extention
                   $extention=$request->file('slider_image')->getClientOriginalExtension();
                    //4 store  image (change file name)
                   $fileNameToStore=$fileName.'_'.time().'.'.$extention;
                    //upload image
                   $path=$request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);
   
   
                }
               else{
                   $fileNameToStore='no image.jpg';
                   }
   
                $slider=new Slider();
                   
   
                $slider->description1=$request->input('description_one');
                $slider->description2=$request->input('description_two');
                $slider->slider_image=$fileNameToStore;
                $slider->status=1;
                
   
                $slider->save(); 
                return redirect('/addslider')->with('status','the Slider has been 
                  successfully saved');
   
           
              

    }
    public function editslider($id){

        $sliders=Slider::find($id);
        return view('admin.editslider')->with('sliders',$sliders);
    }

    public function updateslider(Request $request){

        $slider=Slider::find($request->input('id'));


        $this->validate($request,[
            'description_one'=>'required',
            'description_two'=>'required',
            'slider_image'=>'image|nullable|max:1999'
 
 
                 ]);
 
                 if($request->hasFile('slider_image'))
                 {
    
                     // 1 get file name
                    $fileNameWithText=$request->file('slider_image')->getClientOriginalName();
                     // dd($fileNameWithText);
                     //2 get file name
                    $fileName=pathinfo($fileNameWithText,PATHINFO_FILENAME);
                    //3 get extention
                    $extention=$request->file('slider_image')->getClientOriginalExtension();
                     //4 store  image (change file name)
                    $fileNameToStore=$fileName.'_'.time().'.'.$extention;
                     //upload image
                    $path=$request->file('slider_image')->storeAs('public/slider_images',$fileNameToStore);
    
    
                 
                 if($slider->slider_image !='noimage.jpg')
                 {
                        Storage::delete('public/slider_images/'.$slider->slider_images) ;

                 }
                 $slider->slider_image=$fileNameToStore;
                 $slider->description1=$request->input('description_one');
                 $slider->description2=$request->input('description_two');
                 $slider->slider_image=$fileNameToStore;
                 $slider->status=1;


                }
                 $slider->update(); 
                 return redirect('/sliders')->with('status','the Slider has been 
                   successfully saved');
    
    }

    public function deleteslider($id){
        $slider=Slider::find($id);

            if($slider->slider_image !='noimage.jpg')
            {
                   Storage::delete('public/slider_images/'.$slider->slider_image) ;

            }
        $slider->delete();
        return redirect('/sliders')->with('status','the '.$slider->slider_name.
          ' has been deleted successflly ');
    }

    public function activate_slider($id){
        $slider=Slider::find($id);
        $slider->status=1;
        $slider->update();
        return redirect('/sliders')->with('status','the Slider has activated');

         
    }
     public function disactivate_slider($id){
        $slider=Slider::find($id);
        $slider->status=0;
        $slider->update();
        return redirect('/sliders')->with('status','the Slider has disactivated');
        
     }

}
