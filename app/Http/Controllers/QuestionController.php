<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function detail()
    {
        return Inertia::render('QuestionDetail');
    }
}
