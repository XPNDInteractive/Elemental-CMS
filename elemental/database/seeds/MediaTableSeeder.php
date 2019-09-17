<?php

use Illuminate\Database\Seeder;
use App\Media;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $media = new Media();
       
        $media->path = "/storage/media/post1.jpg";
        $media->save();

        $media = new Media();
        
        $media->path = "/storage/media/blog.jpg";
        $media->save();

       
    }
}
