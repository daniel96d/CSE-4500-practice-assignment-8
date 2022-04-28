<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Equipment extends Model
{
    //use HasFactory;
    use Sortable;

    protected $fillable = [
      'hardwareSpecs',
      'category',
      'user',
      'userContact',
      'manufacturerName',
      'manufacturerSaleContact',
      'manufacturerTechContact',
      'purchaseDate',
      'price',
      'invoice',
    ];

    public $sortable = [
      'manufacturerName',
      'user',
      'category',
    ];

    public function notes()
    {
      return $this->hasMany(Note::class);
    }
    #NEED TO ADD A COLLECTION SIDE OR the other tables
}
