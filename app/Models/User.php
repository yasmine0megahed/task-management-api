<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
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

    // **accessors and mutators
        protected function name(): Attribute
    {
        return Attribute::make(

            // Accessor
            get: fn (string $value) => ucwords($value),

            // Mutator
            set: fn (string $value) => strtolower(trim($value))
        );
    }
        protected function email(): Attribute
    {
        return Attribute::make(
            // Mutator
            set: fn (string $value) => strtolower(trim($value))
        );
    }
    // **relations
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
