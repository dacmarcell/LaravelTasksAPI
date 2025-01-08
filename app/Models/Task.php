<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'createdAt',
        'finishedAt',
        'status',
    ];

    public function categories(){
        return $this->hasMany(Category::class);
    }

}
