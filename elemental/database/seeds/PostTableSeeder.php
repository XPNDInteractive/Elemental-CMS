<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Media;
use App\User;
use App\Page;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = Media::where("id", 1)->first();
        $user = User::all()[0];

        $post = new Post();
        $post->title = "Factoids for Body Esteem Quotient (BEQ)";
        $post->slug = "blog/post/Factoids-for-Body-Esteem-Quotient";
        $post->content = "Psychological Quotient (PQ): The University of Maryland study revealed that emotional eating impacts 75% of people, but it is preventable and this chapter will walk you through a step by step guide.

        Psychological Quotient (PQ): Emotional regulation is key when it comes to managing our feelings, cognitions, and behavior and are all interwoven like a bowl of spaghetti.
        
        Psychological Quotient (PQ): Many of us are taught: “Good girls don’t get mad and they certainly don’t get jealous!” In fact, the two emotions that women avoid the most are anger and jealousy. According to Webster’s dictionary hangry is defined as: bad-tempered or irritable as a result of hunger.
        
        Psychological Quotient (PQ): Learn how to navigate through social media without it impacting your body esteem and avoid “selfitis”.
        
        Exercise Quotient (EQ): Exercise improves brain health which can be good for your heart as well as your brain.
        
        Exercise Quotient (EQ): Studies show if you exercise in the morning you will receive the following benefits: increased brain activity, improved stress management, retention of new information or data, and better reaction to complex situations.
        
        Exercise Quotient (EQ): Exercise improves mental health such as body image, self-esteem, depression, anxiety, stress, ADD/ADHD, and addictive disorders such eating disorders or substance abuse.
        
        Exercise Quotient (EQ): Implement the exercise prescription in this chapter which can be done at home or while traveling designed by Philip Walker, M.S., exercise physiologist and CEO for Walker Wellness Clinic at Cooper Aerobics Center.
        
        Nutrition Quotient (NQ): Carbohydrates are necessary to provide energy and as a source of fuel that you need for physical activity and healthy brain and organ function and should never be omitted or overly restricted as a food group from your nutrition plan.
        
        Nutrition Quotient (NQ): Overcome food rules such as “clean your plate”, “desserts are forbidden”, “good girls do not eat chocolate”, and “thou shall eat the same amount as others.”
        
        Nutrition Quotient (NQ): Eating balanced meals and snacks with a mixture of protein, carbohydrate, and fat will help to regulate and normalize blood sugar throughout the entire day. Eating every 3 to 5 hours with a careful combination of carbohydrate, protein, and fat will regulate your blood sugar level, your hunger, and reduce the need overeating or even binge eating.
        
        Nutrition Quotient (NQ): One ounce of dark chocolate contains saturated fat and nutritious nutrients such as vitamins A, B, and E, calcium, iron, potassium, magnesium, and flavonoids (plant-based antioxidants). Aim for a cocoa content of at least 70 percent for the highest levels of flavonoids.
        
        Fashion Quotient (FQ): Fire the fashion police and stop being so self-critical about your style because you will make side-steps along the way. Do not seek";
        $post->media_id = $img->id;
        $post->user_id = $user->id;
        $post->active = true;
        $post->save();

        $post = new Post();
        $post->title = "Welcome post";
        $post->slug = "blog/post/welcome-post";
        $post->content = "my first post";
        $post->media_id = $img->id;
        $post->user_id = $user->id;
        $post->active = true;
        $post->save();


        $posts = Post::all();

        foreach($posts as $post){
            $page = new Page();
            $page->title = $post->title;
            $page->slug = $post->slug;
            $page->template = "post";
            $page->frontpage = false;
            $page->active = true;
            $page->save();

        }
    }
}
