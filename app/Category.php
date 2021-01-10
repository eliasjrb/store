<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'slug'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}