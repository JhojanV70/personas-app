<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    use HasFactory;
    protected $table = 'tb_departamento';
    protected $primarykey = 'depa_codi';
    public $timestamps=false;
}
