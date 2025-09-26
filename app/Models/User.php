<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Catalog\Area;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\Comment;
use App\Models\Ticket\Attachment;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Catalog\UserStatus;
use App\Models\Ticket\ReplyComment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
        'last_name',
        'email',
        'password',
        'area_id',
        'user_status_id',
        'token',
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

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function replyComments()
    {
        return $this->hasMany(ReplyComment::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name}";
    }
}
