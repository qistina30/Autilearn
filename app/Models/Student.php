<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'age',
        'address',
        'parent_name',
        'contact_number',
        'educator_user_id', // Foreign key referencing the educator
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'educator_user_id', 'user_id');
    }


}
