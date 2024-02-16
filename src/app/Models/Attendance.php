<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['date','start_time', 'end_time'];

    //リレーションの定義(Userモデルとの関連)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //リレーションの定義(BreakRecordモデルとの関連)
    public function BreakRecords()
    {
        return $this->hasMany(BreakRecord::class,);
    }

    
}
