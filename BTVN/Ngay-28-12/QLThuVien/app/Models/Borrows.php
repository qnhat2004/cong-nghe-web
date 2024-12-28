<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    //
    use HasFactory;

    protected $fillable = ['id', 'reader_id', 'book_id', 'borrow_date', 'return_date', 'status'];

    public function reader()
    {
        return $this->belongsTo(Readers::class, 'reader_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id', 'id');
    }
}
