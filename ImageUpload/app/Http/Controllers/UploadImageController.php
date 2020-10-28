<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UploadImageController extends Controller
{
    public function imageUpload()
    {
        return view('imageUpload');
    }




    /*protected  function saveImage($request){

        $image=$request->file('image');
       $filetype=$image->getClientOriginalExtension();
        $imageName=$request->name.'.'.$filetype;
        $directory='image/';
        $imageUrl=$directory.$imageName;
       // $productImage->move($directory,$imageName);
        Image::make($image)->save($imageUrl);
        return $imageUrl;
    }

    protected function productadd($request,$imageUrl){
        $upload=new Image();
        $upload->image=$imageUrl;
        $upload->save();


    }
*/






    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {


        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf'
            ]);
    
            $fileModel = new Image;
    
            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
    
                $fileModel->name = time().'_'.$request->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
    
                return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);

            }
      /* $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $imageee= new Image();
        $imageee->image=$imageName;
        $imageee->save();

        /* Store $imageName name in DATABASE from HERE */
       /* $imageUrl=$this->saveImage($request);
        $this->productadd($request,$imageUrl);*/
       
       /* return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);*/
    }
    
    
    
    
    public function imageView(){
        $image= DB::table('images')->get();
       
        return view('image-view',['image'=>$image]);
    }
}
