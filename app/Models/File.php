<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'path',
        'type',
        'size',
        'user_id',
        'folder_id',
    ];

    public function folder()
    {
        return $this->belongsTo(Folder::class, 'folder_id');
    }

    public function isOwnedBy($user)
    {
        return $this->user_id === $user->id || $user->role === 'admin';
    }
}
