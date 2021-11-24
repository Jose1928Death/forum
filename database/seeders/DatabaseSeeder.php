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
            'email' => 'admin@correo.es',
            'password' => Hash::make('admin'),
            'image' => '/images/profile/default.png'
        ]);

        Tag::create([
            'name' => 'DAW',
            'post' => Str::slug('Desarrollo web'),
        ]);
        Tag::create([
            'name' => 'DAM',
            'post' => Str::slug('Desarrollo de aplicaciones'),
        ]);
        Tag::create([
            'name' => 'ASIR',
            'post' => Str::slug('Administración de sistemas informáticos, grado superior'),
        ]);
        Tag::create([
            'name' => 'SMR',
            'post' => Str::slug('Gestión de sistemas y redes, grado medio'),
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
        QuestionTag::create([
            'question_id'=>1,
            'tag_id'=>3
        ]);
        QuestionTag::create([
            'question_id'=>1,
            'tag_id'=>4
        ]);
        QuestionTag::create([
            'question_id'=>1,
            'tag_id'=>5
        ]);
    }
}
