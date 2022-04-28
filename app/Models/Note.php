<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable = ['comments', 'date', 'equipment_id'];

    public function equipment()
    {
      return $this->belongsTo(Equipment::class);
    }
}
