<?php

use Illuminate\Database\Seeder;
use App\User;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = \Faker\Factory::create();

        $users = User::orderByRaw("RAND()")->take(10)->get();
        
			$user = $users->pop();
        for($i=0; $i<=100; $i++):
            DB::table('jobs')
                ->insert([
          'user_id'  => $user->id,
         'title' => $faker->sentence,
        'detail' => $faker->paragraph,
        'job_category'  => $faker->randomDigit,
        'budget' => $faker->randomDigit,
        'required_skill' => $faker->word,
        'job_type' => $faker->address,
        'job_feature' => $faker->address,
        'attachment' => $faker->url,
        'deadline' => $faker->dateTime(),
         'status' => $faker->word,
   ]);
        endfor;
        }
}
