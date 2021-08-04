<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function addcategory(){
        return view('admin.addcategory');

    }
    public function categories(){
        $categories=Category::get();
        return view('admin.categories')->with('categories',$categories);

    }
    public function savecategory(Request $request){
        //Retrieve data to ensure if category name is existed or not 
        //if existed not add it to database
        //redirect to addcategory url
        $this->validate($request,['category_name'=>'required']);

        $checkcat=Category::where('category_name',$request->input('category_name'))->first();
        $category=new Category();
        if(!$checkcat){
            $category->category_name=$request->input('category_name');
            $category->save(); 
            return redirect('/addcategory')->with('status','the'.$category->category_name.'has been 
              successfully saved');

        }
        else{
            return redirect('/addcategory')->with('status1','the'.$request->input('category_name').
            'has already existed');

        
            }
    }


        public function edit($id){

            $category=Category::find($id);
            return view('admin.editcategory')->with('category',$category);
        }

        public function updatecategory(Request $request){
            // get id from hidden form
            $category=Category::find($request->input('id'));
            $category->category_name=$request->input('category_name');
            $category->update();
            return redirect('/categories')->with('status','the '.$request->input('category_name').
            ' has been updated successflly ');


        }
        public function delete($id){
            // get id from hidden form
            $category=Category::find($id);
            $category->delete();
           return redirect('/categories')->with('status','the '.$category->category_name.
            ' has been deleted successflly ');


        }

}
