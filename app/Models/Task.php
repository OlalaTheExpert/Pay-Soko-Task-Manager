<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
     protected $fillable = [                           
      					   'title',
                           'description',
                           'status',
                           'description',
                           'due_date'                           
                          ];
    protected $dates = ['created_at', 'updated_at', 'due_date'];
}
