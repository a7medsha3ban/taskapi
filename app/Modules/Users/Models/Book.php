<?php

namespace Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','user_id'];
    public function user(){
        $this->belongsTo(User::class);
    }
}
