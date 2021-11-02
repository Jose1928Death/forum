<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionComment;
use App\Models\QuestionLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Traits\Question as QuestionTrain;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    use QuestionTrain;

    public function create(){
        return Inertia::render('CreateQuestion');
    }

    public function store(Request $request){
        $desc = $request->description;
        $title = $request->title;
        $tag = $request->tag;
        $tag_arr = explode(',',$tag);

        $created_q = Question::create([
            'user_id' => Auth::user() -> id,
            'title' => $title,
            'post' => Str::slug($title),
            'description' => $desc,
        ]);
        $q = Question::find($created_q->id);

        $q->tag()->attach($tag_arr);
        return redirect('/')->with('success','Tema creado');
    }

    public function home(){
        $questions = Question::with("comment","tag","questionsave")->orderBy('id','DESC')->get();
        foreach($questions as $k => $v){
            $questions[$k]->is_like=$this->getLikeDetail($v->id)['is_like'];
            $questions[$k]->like_count=$this->getLikeDetail($v->id)['like_count'];
        }
        return Inertia::render("Home",['questions' => $questions]);
    }

    public function detail($post)
    {
        $question = Question::where('post',$post)->with('comment.user','like','tag')->first();
        $question->is_like = $this->getLikeDetail($question->id)['is_like'];
        $question->is_count = $this->getLikeDetail($question->id)['like_count'];
        return Inertia::render('QuestionDetail',['question'=>$question]);
    }
    public function like($id){
        QuestionLike::create([
            'user_id' => Auth::user()->id,
            'question_id' => $id
        ]);
        return response()->json(['success' => true]);
    }

    public function createComment(Request $request){
        $q_id = $request->question_id;
        $comment = $request -> comment;

        $cmt = QuestionComment::create([
            'question_id' => $q_id,
            'user_id' => Auth::user()->id,
            'comment' => $comment,
        ]);
        $createdComment = QuestionComment::where('id', $cmt->id)->with('user')->first();
        return ['success' => true, 'comment' => $createdComment];
    }
}
