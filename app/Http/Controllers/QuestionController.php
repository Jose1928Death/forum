<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionComment;
use App\Models\QuestionLike;
use App\Models\QuestionSave;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Traits\Question as QuestionTrain;
use Illuminate\Database\Eloquent\Builder;
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

    public function home(Request $request){
        //chequear tag
        if($post = $request->tag){
            $tag = Tag::where('post',$post)->first();
            $questions = $tag->question()->with("comment","tag","questionsave")->orderBy('id','DESC')->paginate(3);
        }elseif($type = $request->type){
            //preguntas sin respuestas
            if($type == 'answer'){
                $questions = Question::whereHas('comment',function(Builder $q){
                    $q->where('user_id', Auth::user()->id);
                })->with("comment","tag","questionsave")->paginate(3);
            }
            if($type=='unanswer'){
                $questions = Question::has('comment','<',1)->with('comment','tag','questionsave')->paginate(3);
            }
        }else{
            $questions = Question::with("comment","tag","questionsave")->orderBy('id','DESC')->paginate(3);
        }
        //return $questions;
        foreach($questions as $k => $v){
            $questions[$k]->is_like=$this->getLikeDetail($v->id)['is_like'];
            $questions[$k]->like_count=$this->getLikeDetail($v->id)['like_count'];
            $questions[$k]->is_save=$this->isSave($v->id);
        }
        return Inertia::render("Home",['questions' => $questions]);
    }

    public function detail($post)
    {
        $question = Question::where('post',$post)->with('comment.user','like','tag')->first();
        $question->is_like = $this->getLikeDetail($question->id)['is_like'];
        $question->is_count = $this->getLikeDetail($question->id)['like_count'];
        $question->is_save=$this->isSave($question->id);

        return Inertia::render('QuestionDetail',['question' => $question]);
    }
    public function like($id){
        QuestionLike::create([
            'user_id' => Auth::user()->id,
            'question_id' => $id
        ]);
        return response()->json(['success' => true]);
    }

    public function unlike($id){
        QuestionLike::where([
            'user_id' => Auth::user()->id,
            'question_id' => $id
        ])->delete();
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
    //Pregunta usuario
    public function userQuestion(){
        $user_id = Auth::user()->id;
        $questions = Question::where('user_id', $user_id)->paginate(10);
        return Inertia::render('UserQuestion',['questions'=>$questions]);
    }
    //Borrar pregunta
    public function delete($id){
        Question::where('id',$id)->delete();
        return response()->json(['success' => true]);
    }
    //Fijar tema
    public function setFix(){
        $id = request()->id;
        Question::where('id',$id)->update([
            "fiexed" => 'true'
        ]);
        return response()->json(['success' => true]);
    }
    public function setunFix(){
        $id = request()->id;
        Question::where('id',$id)->update([
            "fiexed" => 'false'
        ]);
        return response()->json(['success' => true]);
    }
    public function saveQuestion(){
        $q_id = request()->question_id;
        $user_id=Auth::user()->id;
        QuestionSave::create([
            'question_id'=>$q_id,
            'user_id'=>$user_id,
        ]);
        return response()->json(['success'=>true]);
    }
    public function unsaveQuestion(){
        $q_id = request()->question_id;
        $user_id=Auth::user()->id;
        QuestionSave::where([
            'question_id'=>$q_id,
            'user_id'=>$user_id,
        ])->delete();
        return response()->json(['success'=>true]);
    }
    //Mostrar preguntas guardadas
    public function showSaveQuestion(){
        $questions = QuestionSave::where('user_id',Auth::user()->id)->with('question')->get();
        return Inertia::render('SaveQuestion',['questions'=>$questions]);
    }
}
