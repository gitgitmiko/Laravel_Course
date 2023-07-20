<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //untuk menggenerate 100 data random pada table users
        factory(App\User::class, 100)->create() //kapan pake eloquent ini create() ketika sudah ada model di App/User
        ->each(function($user){
            factory(App\Hobby::class, rand(1,8))->create(
                [
                    'user_id' => $user->id
                ]
            )
            ->each(function($hobby){
                $tag_ids = range(1,8);
                shuffle($tag_ids);
                $assignments = array_slice($tag_ids, 0, rand(0,8)); //eg 5,2,8
                foreach($assignments as $tag_id){
                    DB::table('hobby_tag') //kenapa ini pakai facades DB, karena hobby_tag tidak punya model di App/hobby_tag
                    ->insert(
                        [
                            'hobby_id' => $hobby->id,
                            'tag_id' => $tag_id,
                            'created_at' => Now(),
                            'updated_at' => Now()
                        ]
                    );
                }
            });
        });
    }
}
