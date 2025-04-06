<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'Tasks';

    protected $fillable = [
        'id_user',
        'id_status',
        'id_category',
        'title',
        'task_date',
        'description',
        'deadline',
        'archive_status'
    ];
}
