<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pais extends Model
{
    use HasFactory;
    protected $table = "tb_pais";
    protected $primaryKey = 'pais_codi';
    public $timestamps = false;

    protected function casts(): array
    {
        return[
            'pais_codi'=>'string', 'pais_nomb'=>'string'
    ];
    }
}