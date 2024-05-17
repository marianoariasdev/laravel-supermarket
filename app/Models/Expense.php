<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount',
        'supplier_id',
        'date',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
