<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'administrador@correo.es',
            'password' => Hash::make('password'),
            'image' => '/images/profile/default.png'
        ]);
        Tag::create([
            'name' => 'Web Deveploment',
            'post' => Str::slug('Web Deveploment'),
        ]);
        Tag::create([
            'name' => 'Mobile Deveploment',
            'post' => Str::slug('Mobile Deveploment'),
        ]);
        Tag::create([
            'name' => 'Computer Deveploment',
            'post' => Str::slug('Computer Deveploment'),
        ]);
        Question::create([
            'user_id'=>1,
            'post'=>Str::slug('Laravel 8 not work?'),
            'title'=>'Laravel 8 not work?',
            'description'=>"Awoooooooooooooooo",
        ]);
        QuestionTag::create([
            'question_id'=>1,
            'tag_id'=>1
        ]);
        QuestionTag::create([
            'question_id'=>1,
            'tag_id'=>2
        ]);
    }
}
