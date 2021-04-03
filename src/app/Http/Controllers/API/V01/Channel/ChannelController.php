<?php

namespace App\Http\Controllers\API\V01\Channel;

use App\Http\Controllers\Controller;
use App\Models\Channel;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelController extends Controller
{

    public function all()
    {
        return response()->json(resolve(ChannelRepository::class)->All(), 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        resolve(ChannelRepository::class)->Store($request);

        return response()->json(['message' => 'channel created successfully'], 201);
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        resolve(ChannelRepository::class)->Update($request);

        return response()->json(['message' => 'channel update successfully'], 200);

    }

    public function delete(Request $request)
    {
        resolve(ChannelRepository::class)->Delete($request);

        return response()->json(['message' => 'channel deleted successfully'], 200);
    }

}
