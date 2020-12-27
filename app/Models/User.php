<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'national_code',
        'gender',
        'birthdate',
        'mobile',
        'phone',
        'address',
        'description',
        'image',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function targets()
    {
        return $this->belongsToMany(Target::class);
    }
    public function motivationals()
    {
        return $this->hasMany(Motivational::class, 'user_id');
    }

    public function operations()
    {
        return $this->belongsToMany(Operation::class);
    }

}
