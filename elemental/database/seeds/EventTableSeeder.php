<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Media;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = Media::where("id", 1)->first();

        $e = new Event();
        $e->name = "body esteem launch";
        $e->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ";
        $e->address = "My House";
        $e->phone = "(503)111-1111";
        $e->media_id = $img->id;
        $e->active = true;
        $e->save();

        $e = new Event();
        $e->name = "body esteem launch updated";
        $e->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ";
        $e->address = "My House";
        $e->phone = "(503)111-1121";
        $e->media_id = $img->id;
        $e->active = true;
        $e->save();

    }
}
