<?php


namespace App\Repositories;


use App\Models\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelRepository
{

    public function All()
    {
        return Channel::all();
    }


    /**
     * @param Request $request
     */
    public function Store(Request $request)
    {
        Channel::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    }

    public function Update(Request $request)
    {
        Channel::find($request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);
    }

    public function Delete(Request $request)
    {
        Channel::destroy($request->id);
    }

}
