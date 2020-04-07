<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = DB::table('users')->first();

        // $titles = ['あいうえお','かきくけこ','さしすせそ'];
       
        DB::table('posts')->insert([
            'user_id'=>$user->id,
            'title'=>'テストです',
            'body'=>'テストテストテストテストテストテストテストテストテスト
            テストテストテストテストテストテストテストテストテストテストテストテスト
            テストテストテストテストテストテストテストテストテストテストテストテストテストテストテスト。',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        
       
    }
}
