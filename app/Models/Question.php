<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['question_id','post','title','description'];

    public function comment(){
        return $this->hasMany(QuestionComment::class,'question_id');
    }
    public function like(){
        return $this->hasMany(QuestionLike::class,'question_id');
    }
    public function QuestionSave(){
        return $this->hasMany(QuestionSave::class,'question_id');
    }
    public function Tag(){
        return $this->belongsToMany(Tag::class,'question_tags');

    }
}
