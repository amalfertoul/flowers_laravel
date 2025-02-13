<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'eventDate', 'phoneNumber', 'eventTitle', 'request'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
