<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //

   
    public function addproduct(){
        $categories=Category::All()->pluck('category_name','category_name');
        return view('admin.addproduct')->with('categories',$categories);

    }
    
    public function saveproduct(Request $request){
        /*

                //1 validate data 
                            [max size of image :1999 means 2megabyte]
                //2  upload image

                            A_ get image name with extention
                            B_ get file name without extention
                            C_ get extention
                            D_ file name to store
                            E_ upload image to folder
        */

        // 1 validate data 
        $this->validate($request,['product_name'=>'required',
                                    'product_price'=>'required',
                                    'product_image'=>'image|nullable|max:1999'
    
    
    
                                    ]);

        // // 2 upload image
        if($request->input('product_category')){
             if($request->hasFile('product_image'))
             {

                 // 1 get file name
                $fileNameWithText=$request->file('product_image')->getClientOriginalName();
                 // dd($fileNameWithText);
                 //2 get file name
                $fileName=pathinfo($fileNameWithText,PATHINFO_FILENAME);
                //3 get extention
                $extention=$request->file('product_image')->getClientOriginalExtension();
                 //4 store  image (change file name)
                $fileNameToStore=$fileName.'_'.time().'.'.$extention;
                 //upload image
                $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);


             }
            else{
                $fileNameToStore='no image.jpg';
                }



            $product=new Product();
             $product->product_name=$request->input('product_name');
             $product->product_price=$request->input('product_price');
             $product->product_category=$request->input('product_category');
             $product->product_image=$fileNameToStore;
             $productStatus=0;
             if($request->input('product_status')){

                 $productStatus=1;

                }
            else{
                 $productStatus=0;

             }
             $product->status=$productStatus;

             $product->save(); 
             return redirect('/addproduct')->with('status','the'.$product->product_name.'has been 
               successfully saved');

        }
            else{
                return redirect('/addproduct')->with('status1','you must select category '); 
                         

            }   

        
        
    }

    public function products(){

        $products=Product::get();
        return view('admin.products')->with('products',$products);
    }

    public function editproduct($id){
        $categories=Category::All()->pluck('category_name','category_name');

        $product=Product::find($id);
        return view('admin.editproduct')->with('product',$product)->with('categories',$categories);
     }

    
    
     public function updateproduct(Request $request){

        $product=Product::find($request->input('id'));

             // get id from hidden form
       /*

                //1 validate data 
                            [max size of image :1999 means 2megabyte]
                //2  upload image

                            A_ get image name with extention
                            B_ get file name without extention
                            C_ get extention
                            D_ file name to store
                            E_ upload image to folder
        */

        // 1 validate data 
        $this->validate($request,['product_name'=>'required',
                                    'product_price'=>'required',
                                    'product_image'=>'image|nullable|max:1999'
    
    
    
                                    ]);

        // // 2 upload image

        // // 2 upload image
            if($request->hasFile('product_image'))
            {

                // 1 get file name
               $fileNameWithText=$request->file('product_image')->getClientOriginalName();
                // dd($fileNameWithText);
                //2 get file name
               $fileName=pathinfo($fileNameWithText,PATHINFO_FILENAME);
               //3 get extention
               $extention=$request->file('product_image')->getClientOriginalExtension();
                //4 store  image (change file name)
               $fileNameToStore=$fileName.'_'.time().'.'.$extention;
                //upload image
               $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);

                if($$product->product_image !='noimage.jpg')
                    {
                           Storage::delete('public/product_images/'.$product) ;

                    }
                    $product->product_image=$fileNameToStore;


            }
                        //save data in database

            $product->product_name=$request->input('product_name');
            $product->product_price=$request->input('product_price');
            $product->product_category=$request->input('product_category');
            $productStatus=0;
            if($request->input('product_status')){

                $productStatus=1;

               }
           else{
                $productStatus=0;

            }
            $product->status=$productStatus;
            $product->update();
            return redirect('/products')->with('status','the'.$product->product_name.'  has been 
               successfully updated');
             


     }
     public function deleteproduct($id){
            // get id from hidden form
        $product=Product::find($id);

            if($product->product_image !='noimage.jpg')
            {
                   Storage::delete('public/product_images/'.$product->product_image) ;

            }
        $product->delete();
        return redirect('/products')->with('status','the '.$product->product_name.
          ' has been deleted successflly ');


         }
         public function activate_product($id){
            $product=Product::find($id);
            $product->status=1;
            $product->update();
            return redirect('/products')->with('status','the '.$product->product_name.
            ' has activated');

             
        }
         public function disactivate_product($id){
            $product=Product::find($id);
            $product->status=0;
            $product->update();
            return redirect('/products')->with('status','the '.$product->product_name.
            ' has disactivated');
         }
    
}

