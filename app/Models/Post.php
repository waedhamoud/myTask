<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $fillable = [
     'name',
     'category_num',
     'created_at',
     'updated_at',
 ];
 public $timestamps = true;
}
