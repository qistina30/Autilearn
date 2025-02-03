<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // Specify the primary key for this model
    protected $primaryKey = 'user_id'; // Set user_id as the primary key

    // Make sure to tell Eloquent that the primary key is not an incrementing integer
    public $incrementing = false; // Since user_id is a string (not auto-incremented)
    protected $fillable = [
        'name',
        'email',
        'password',
        'contact_number',
        'role',
        'organization_name',
        'user_id',
    ];


    // Get the educator's ID as EDxxxxx format
    public function getEducatorIdAttribute()
    {
        return 'ED' . str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'educator_user_id', 'user_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
