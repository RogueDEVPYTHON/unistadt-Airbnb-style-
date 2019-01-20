<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flats;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FlatController extends Controller
{
    /**
     * controller Cosntructor
     * 
     * @return void
     */
    public function __construct(){

    }

    /**
     * Show Index Page
     * 
     * @return void
     */
    public function ShowIndex(){
        $data['title'] = 'Home';
        $data['flats'] = Flats::orderby('id', 'desc')->take(4)->get();
        return view('home', $data);
    }

    /**
     * Show Contact Us Form
     * 
     * @return void
     */
    public function Contact(){
        $data['title'] = 'Contact Us';
        return view('contact', $data);
    }

    /**
     * Show Landlords Page
     * 
     * @return void
     */
    public function Landlords()
    {
        $data['title'] = 'Landlords';
        return view('landlord', $data);
    }

    /**
     * Upload Images Method
     * 
     * @return Flats Object
     */
    public function UploadImages(Request $request){
        
        $new_flat = Flats::where('tmp_token', $request->_token)->where('user_id', auth()->user()->id)->first();
        if(empty($new_flat))
            $new_flat = new Flats();
        $new_flat->tmp_token = $request->_token;
        $new_flat->user_id = auth()->user()->id;

        $file = $request->file('file');
        if(!empty($file)){
            $destination_path = 'files/' . 'flats/'.$request->_token;
            Storage::put($destination_path, $file);
            $new_flat->path = $destination_path;
        }
        $new_flat->save();
        return $new_flat;
    }
    /**
     * Insert Description Method
     * 
     * @return void
     */
    public function InsertDescription(Request $request){
        //return $request;
        $new_flat = Flats::where('tmp_token', $request->_token)->where('user_id', auth()->user()->id)->first();
        if(empty($new_flat))
            $new_flat = new Flats();
        $new_flat->headlines = $request->headline;
        $new_flat->description = $request->description;
        $new_flat->address = $request->address;
        $new_flat->tags = $request->tags;
        $new_flat->save();
        return back();
    }

    /**
     * Flats method page
     * 
     * @return void
     */
    public function Flats(){
        $data['title'] = 'Flats';
        $data['flats'] = Flats::all();
        return view('flats', $data);
    }

    /**
     * Single View
     * 
     * @return void 
     */
    public function Single($id){
        $data['flat'] = Flats::where('id', $id)->first();
        $data['title'] = $data['flat']->headlines;
        return view('single', $data);
    }
}
