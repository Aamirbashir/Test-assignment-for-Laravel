<?php

use Illuminate\Database\Seeder;
use App\films;
use App\comments;
class FilmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      Films::truncate();
      comments::truncate();

        $films=Films::create([
                'name' => "Skyscraper",
                'description' => "FBI Hostage Rescue Team leader and U.S. war veteran Will Sawyer now assesses security for skyscrapers. On assignment in Hong Kong he finds the tallest, safest building in the world suddenly ablaze and he's been framed for it. A wanted man on the run, Will must find those responsible, clear his name and somehow rescue his family who are trapped inside the building - above the fire line",
                'release_date' =>'2018-05-04',
                'ratings' =>5.9,
                'ticket_price' =>25.30,
                'country' =>"USA",
                'genrs' =>"action,thrilling,adventure",
                'photo' =>"https://yts.am/assets/images/movies/skyscraper_2018/medium-cover.jpg"

            ]);
        comments::create([
          'user_id'=>1,
           'film_id'=>$films->id,
           'comment'=>'This was an amazing moview i ever watched'  
        ]);
        $films=Films::create([
                'name' => "Ant-Man and the Wasp",
                'description' => "In the aftermath of Captain America: Civil War (2016), Scott Lang grapples with the consequences of his choices as both a superhero and a father. As he struggles to rebalance his home life with his responsibilities as Ant-Man, he's confronted by Hope van Dyne and Dr. Hank Pym with an urgent new mission. Scott must once again put on the suit and learn to fight alongside The Wasp as the team works together to uncover secrets from their past",
                'release_date' =>'2018-05-04',
                'ratings' =>7.9,
                'ticket_price' =>20.30,
                'country' =>"USA",
                'genrs' =>"action,thrilling,adventure,commedy",
                'photo' =>"https://yts.am/assets/images/movies/skyscraper_2018/medium-cover.jpg"

            ]);
         comments::create([
          'user_id'=>1,
           'film_id'=>$films->id,
           'comment'=>'This was an amazing moview i ever watched'  
        ]);
          
    }
}
