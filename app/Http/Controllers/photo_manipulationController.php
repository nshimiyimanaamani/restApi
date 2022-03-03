<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoto_manipulationRequest;
use App\Http\Requests\UpdatePhoto_manipulationRequest;
use App\Models\Album;
use App\Models\Photo_manipulation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class photo_manipulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhoto_manipulationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function resize(StorePhoto_manipulationRequest $request)
    {
        $all= $request->all();
        //
        $image=$all['image'];

        /** @var UploadFile|string $image */
        unset($all['image']);
        $data=[
            'type'=>Photo_manipulation::TYPE_RESIZE,
            'data'=>json_encode($all),
        'user_id'=>null
        ];
        if(isset($all['album_id']))
        {
            $data['album_id']=$all['album_id'];
        }
        $dir='images/'.\Illuminate\Support\Str::random().'/';
        $absolutepath=public_path($dir);
        File::makeDirectory($absolutepath);
        if($image instanceof UploadedFile){
            $data['name']=$image->getClientOriginalName();
            $filename=pathinfo($data['name'],PATHINFO_FILENAME);
            $extension=$image->getClientOriginalExtension();
            $image->move($absolutepath,$data['name']);
            // $data['path']=$dir.$data['name'];
 
        }
        else
        {
            $data['name']=pathinfo($image,PATHINFO_BASENAME);
            $filename=pathinfo($image,PATHINFO_FILENAME);
            $extension=pathinfo($image,PATHINFO_EXTENSION);
            copy($image,$absolutepath.$data['name']);
           
        }
         $data['path']=$dir.$data['name'] ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo_manipulation  $photo_manipulation
     * @return \Illuminate\Http\Response
     */
    public function show(Photo_manipulation $photo_manipulation)
    {
        //
    }
public function ByAlbum(Album $album)
{

}
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhoto_manipulationRequest  $request
     * @param  \App\Models\Photo_manipulation  $photo_manipulation
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo_manipulation  $photo_manipulation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo_manipulation $photo_manipulation)
    {
        //
    }
}
