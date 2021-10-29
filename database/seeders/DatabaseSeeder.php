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
            'name' => 'ad',
            'email' => 'admin@correo.es',
            'password' => Hash::make('123456789'),
            'image' => '/images/profile/default.png'
        ]);

        Tag::create([
            'name' => 'Web',
            'post' => Str::slug('Desarrollo web'),
        ]);
        Tag::create([
            'name' => 'Aplicacion',
            'post' => Str::slug('Desarrollo de aplicaciones'),
        ]);
        Tag::create([
            'name' => 'Informal',
            'post' => Str::slug('Cosas que pasan en el instituto'),
        ]);

        Question::create([
            'user_id'=>1,
            'post'=>Str::slug('Admin'),
            'title'=>'Bienvenidos al foro por parte de la administracion',
            'description'=>"Este mensaje ha sido generado para dar la bienvenida a los profesores y los alumnos del instituto",
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
