<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name','email','company_name','password','is_active','created_at','updated_at'];
}
