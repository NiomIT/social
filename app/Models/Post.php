<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }
    public function subsubcategory(){
        return $this->belongsTo(Subsubcategory::class,'subsubcategory_id','id');
    }

    public function comment() {
        return $this->hasMany(Comment::class, 'post_id', 'id')->whereNull('parent_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }



}
