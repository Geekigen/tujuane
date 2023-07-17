<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
protected $fillable=['images','user_id'];


public function user()
{
    return $this->belongsTo(User::class);
}

public function likes()
{
    return $this->hasMany(Like::class);
}
}
