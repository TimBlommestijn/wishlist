<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() && Auth::user()->admin == 1){
            $wishes = DB::table('users')
            ->join('wishes', 'users.id', '=', 'wishes.uuid')
            ->select('wishes.*','users.name')
            ->get();
            return view('wish')->with(compact('wishes'));

        } else if(Auth::user()){
            $wishes = DB::table('users')
            ->join('wishes', 'users.id', '=', 'wishes.uuid')
            ->select('wishes.*','users.name')->where('wishes.uuid', Auth::user()->id)
            ->get();
            return view('wish')->with(compact('wishes'));

        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createWish');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // handle file upload
        if($request->hasFile('wish_image')){
            // get file name with ext
            $filenameWithExt = $request->file('wish_image')->getClientOriginalName();
            // seperate filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('wish_image')->getClientOriginalExtension();
            // create file 2 store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image
            $path = $request->file('wish_image')->storeAs('public/wish_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noImage.jpg';
        }

        // check if its an user
        if(Auth::user()){
            // create the post
            $wish = new Wish();
            $wish->wish_name = request('name');
            $wish->description = request('description');
            $wish->price = request('price');
            $wish->url = request('url');
            $wish->wish_image = $fileNameToStore;
            $wish->uuid = Auth::user()->id;
            $wish->save();
            return redirect('/wish');
        }else{
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(Wish $wish)
    {
        error_log($wish);
        // $wish = Wish::find($wish)->join('users', 'user.id', '');
        $wishes = DB::table('wishes')->where('wishes.id', $wish->id)
            ->join('users', 'users.id', '=', 'wishes.uuid')
            ->select('wishes.*','users.name')
            ->get();
        return view('specificWish')->with('wish', $wishes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function edit(Wish $wish)
    {
        if(Auth::user()->admin){
            $wishes = Wish::find($wish->id);
            return view('editWish')->with('wish', $wishes);
        }else if(Auth::user()->id == $wish->uuid){
            $wishes = Wish::find($wish->id);
            return view('editWish')->with('wish', $wishes);
        }else{
            return redirect('/');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wish $wish)
    {
        if(Auth::user()->admin){
            $wish->wish_name = $request->name;
            $wish->description = $request->description;
            $wish->price = $request->price;
            $wish->url = $request->url;
            $wish->push();
            return redirect('/wish/'.$wish->id);
        }else if(Auth::user()->id == $wish->uuid){
            $wish->wish_name = $request->name;
            $wish->description = $request->description;
            $wish->price = $request->price;
            $wish->url = $request->url;
            $wish->push();
            return redirect('/wish/'.$wish->id);
        }else{
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wish $wish){
        $wishCheck = $wish->find($wish->id);
        if(Auth::user()->admin == 1){
            $wish->destroy($wish->id);
            Storage::delete($wishCheck->wish_image);
            return redirect('/wish');
        }else if(Auth::user()->id == $wish->uuid){
            $wish->destroy($wish->id);
            Storage::delete('wish_images/'.$wishCheck->wish_image);
            return redirect('/wish');
        }else{
            return redirect('/');
        }
        
    }
}
