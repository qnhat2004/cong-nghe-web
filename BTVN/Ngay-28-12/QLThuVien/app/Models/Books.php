<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //
    use HasFactory;

    protected $fillable = ['id', 'name', 'author', 'category', 'year', 'quantity'];

    public function borrows()
    {
        return $this->hasMany(Borrows::class, 'book_id', 'id');
    }
}
