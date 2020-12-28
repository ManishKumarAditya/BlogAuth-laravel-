<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];
  public function getAuthorAttribute($value){
      return "Mr ".$value;

  }
  public function setBodyAttribute($value){
      $this->attributes['body']=strtolower($value);
  }

  public function SetTitleAttribute($value){
      $this->attributes['title']=strtoupper($value);
  }

}