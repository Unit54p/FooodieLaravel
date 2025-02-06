<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrderHistory extends Model
{
    protected $table = 'historyorderuser';
    protected $fillable = ['user_id', 'order_number', 'order_date', 'total_price', 'order_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
