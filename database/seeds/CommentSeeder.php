<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{

    static $comments = [
        [
            'id_user'=>1,
            'body'=>"This is the first comment",
            'updated_at'=>"2021-09-01 22:33:10",
            'created_at'=>"2021-09-01 22:33:10",
        ],[
            'id_user'=>2,
            'body'=>"Lorem ipsium dolar, command of laravel after work",
            'updated_at'=>"2021-09-01 22:34:50",
            'created_at'=>"2021-09-01 22:34:50",
        ]
    ];

    public function run()
    {
        foreach(Self::$comments as $comment){
            DB::table('comments')->insert(
                $comment
            );
        }
    }
}