<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $channel=Channel::all();
        return view('channel.list',['channel'=>$channel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $country = json_decode(file_get_contents("https://api.first.org/data/v1/countries"), true);

        // dd($country['data']);
        // foreach ($country['data'] as $key => $value) {
        //     // dd($value);
        //     # code...
        // }

         $cat=Category::all();
        return view('channel.add',['country'=>$country['data'],'category'=>$cat]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChannelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelRequest $request)
    {
        //

        $filenameWithExt = $request->file('filename')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('filename')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;
        $path = $request->file('filename')->storeAs('public/thumbnails', $filenameSimpan);

        // dd($path);


        $channel = new Channel([
            "title" => $request->get('title'),
            "category" => $request->get('category'),
            "thumnails" => $filenameSimpan,
            "country" => $request->get('country'),
            "channelurl" => $request->get('channelurl'),

        ]);
        $channel->save();

        // echo public_path();


        return redirect()->route('channel.index')
        ->with('success','Channel created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        //

        $country = json_decode(file_get_contents("https://api.first.org/data/v1/countries"), true);

        // dd($country['data']);
        // foreach ($country['data'] as $key => $value) {
        //     // dd($value);
        //     # code...
        // }

         $cat=Category::all();
        return view('channel.edit',['country'=>$country['data'],'category'=>$cat,'channel'=>$channel]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelRequest  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelRequest $request, Channel $channel)
    {
        //
        if($request->hasFile('filename')){
            $filenameWithExt = $request->file('filename')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('filename')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('filename')->storeAs('public/thumbnails', $filenameSimpan);
            $channel->title=$request->title;
            $channel->category=$request->category;
            $channel->country=$request->country;
            $channel->channelurl=$request->channelurl;
            $channel->thumnails=$filenameSimpan;
            $channel->update();
                    // dd($request);

        }
        else {
            $channel->title=$request->title;
            $channel->category=$request->category;
            $channel->country=$request->country;
            $channel->channelurl=$request->channelurl;
            $channel->update();
        }



        return redirect()->route('channel.index')
                        ->with('success','Channel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
        $channel->delete();

        return redirect()->route('channel.index')
                        ->with('success','Channel deleted successfully');
    }
}
