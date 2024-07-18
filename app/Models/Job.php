<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#Model to store data in to database
class Job extends Model
{
    use HasFactory;

    protected $fillable = ['urls', 'selectors', 'status'];
}
