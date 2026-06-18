<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data=Banner::paginate(3);//select * from banners;
        // echo "<pre>";
        // print_r($data);
        return view('banner.index',compact('data'));

       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         "img"=>"required",
    //     ]);

    //     $imgName=time() . '_banner.' . $request->img->extension();
    //     $request->img->move(public_path('images'),$imgName);


    //     $table=new Banner();
    //     $table->img=$imgName;
    //     if(strcasecmp($request->status,"on")==0)
    //         $table->status=1;
    //     else
    //         $table->status=0;

    //     $table->save();

    //     return redirect('banner')->withSuccess("Inserted Successfully!!!");



        
    // }
   public function store(Request $request)
    {
        // 1. Strictly validate the incoming file from your web browser form
        $request->validate([
            "img" => "required|image|mimes:jpeg,jpg,png|max:5120", 
        ]);

        // 2. Grab the file instance and convert to permanent Base64 string
        $file = $request->file('img');
        $binaryData = file_get_contents($file->getRealPath());
        $base64Encoded = base64_encode($binaryData);
        $mimeType = $file->getMimeType();
        $permanentImageString = 'data:' . $mimeType . ';base64,' . $base64Encoded;

        // 3. Save details into MongoDB
        $table = new Banner();
        $table->img = $permanentImageString; 
        
        // Handle the status configuration correctly
        if (strcasecmp($request->status, "on") == 0) {
            $table->status = 1;
        } else {
            $table->status = 0;
        }

        $table->save();

        // Use standard redirect route to match your flow cleanly
        return redirect('banner')->withSuccess("Inserted Successfully!!!");
    }
    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
        return view('banner.edit',compact('banner'));
    }

   
    // public function update(Request $request, Banner $banner)
    // {
    //     //
      
    //     if(isset($request->img)){
    //         $imgName=time()."banner".".".$request->img->extension();
    //         $request->img->move(public_path('images'),$imgName);
    //         $banner->img=$imgName;
    //     }
       

    //     if(strcasecmp($request->status,"on")==0)
    //         $banner->status=1;
    //     else
    //         $banner->status=0;
    //     $banner->save();


    //     return redirect('banner')->withSuccess("Updated Successfully!!!");

    // }
    public function update(Request $request, Banner $banner)
    {
        // FIXING THE DUMMY IMAGE LOOPHOLE: Check if a new image was uploaded
        if ($request->hasFile('img')) {
            $request->validate([
                "img" => "image|mimes:jpeg,jpg,png|max:5120",
            ]);

            $file = $request->file('img');
            $binaryData = file_get_contents($file->getRealPath());
            $base64Encoded = base64_encode($binaryData);
            $mimeType = $file->getMimeType();
            
            // Overwrite with permanent Base64 text string instead of local file name
            $banner->img = 'data:' . $mimeType . ';base64,' . $base64Encoded;
        }
        // If NO new image was selected during edit, it leaves the old base64 image completely safe!

        // Handle status update safely
        if (strcasecmp($request->status, "on") == 0) {
            $banner->status = 1;
        } else {
            $banner->status = 0;
        }
        
        $banner->save();

        return redirect('banner')->withSuccess("Updated Successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //

        $banner->delete();
        return redirect('banner')->withSuccess("Deleted Successfully!!!");


    }
}
