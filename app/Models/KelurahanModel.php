<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanModel extends Model
{
    use HasFactory;

    protected $table = 'villages';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
