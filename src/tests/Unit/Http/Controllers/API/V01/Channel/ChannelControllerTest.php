<?php

namespace Tests\Unit\Http\Controllers\API\V01\Channel;

use App\Http\Controllers\API\V01\Channel\ChannelController;
use App\Models\Channel;
use Illuminate\Routing\Route;
use Tests\TestCase;

class ChannelControllerTest extends TestCase
{

    public function test_all_channel_list_be_accessable()
    {
        $response = $this->get(route('channel.all'));
        $response->assertStatus(200);
    }

    public function test_channel_can_be_created()
    {
        $response = $this->postJson(route('channel.store'), [
            'name' => 'new channel'
        ]);

        $response->assertStatus(201);
    }

    public function test_store_channel_should_be_validate()
    {
        $response = $this->postJson(route('channel.store'));
        $response->assertStatus(422);
    }

    public function test_update_channel_should_be_validate()
    {
        $response = $this->json('PUT', route('channel.update'),[]);
        $response->assertStatus(422);
    }

    public function test_update_channel()
    {
        $channel = Channel::factory()->create([
            'name' => 'laravel'
        ]);
        $response = $this->json('PUT', route('channel.update', [
            'id' => $channel->id,
            'name' => 'vew js'
        ]));

        $channelUpdate = Channel::find($channel->id);
        $response->assertStatus(200);
        $this->assertEquals('vew js', $channelUpdate->name);
    }


    public function test_channel_delete()
    {
        $channel = Channel::factory()->create();

        $response = $this->json('DELETE', route('channel.delete'));
        $response->assertStatus(200);
    }

}
