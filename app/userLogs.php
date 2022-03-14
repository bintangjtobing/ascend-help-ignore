<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userLogs extends Model
{
    protected $table = 'user_logs';
    protected $fillable = [
        'userId', 'ipAddress', 'notes'
    ];
    protected $casts = [
        'created_at' => 'datetime:d M, Y H:i:s',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
