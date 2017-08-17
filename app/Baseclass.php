<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baseclass extends Model
{
    public function childCategory(){
        return $this->hasMany('App\Baseclass', 'parent_id', 'id');
    }

    public function allChildrenCategorys(){
        return $this->childCategory()->with('allChildrenCategorys');
    }
}
