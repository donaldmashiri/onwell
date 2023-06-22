<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'quantity',
        'price',
        'status',
    ];

    public function stockRequests()
    {
        return $this->hasMany(StockRequested::class, 'stock_id');
    }

}
