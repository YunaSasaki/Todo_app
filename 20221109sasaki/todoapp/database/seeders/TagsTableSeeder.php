<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1レコード
        $tag = new \App\Models\Tag([
            'content' => '仕事'
        ]);
        $tag->save();

        //2レコード
        $tag = new \App\Models\Tag([
            'content' => '家事'
        ]);
        $tag->save();

        //3レコード
        $tag = new \App\Models\Tag([
            'content' => '個人'
        ]);
        $tag->save();

        //4レコード
        $tag = new \App\Models\Tag([
            'content' => 'その他'
        ]);
        $tag->save();
    }
}
