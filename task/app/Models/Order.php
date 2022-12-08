<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot(['quantity']);
    }

    public function type()
    {
        return $this->belongsTo(OrderType::class, 'type_id', 'id');
    }
}
