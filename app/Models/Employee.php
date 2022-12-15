<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'author_email',
        'employment_date',
        'phone',
        'photo',
        'director',
        'admin_created_id',
        'admin_updated_id',
        'position_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_email', 'author_email');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
