<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends MainModel
{
    use HasFactory;

    public function getChildrenAttribute()
    {
        //dd($this->id);
        $children = Category::orderBy('sort','asc')->where(['parent_id'=>$this->id])->get();
        return $children;
    }
}
