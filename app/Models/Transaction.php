<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = ['amount', 'category_id', 'type', 'transaction_date'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
