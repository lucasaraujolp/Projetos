<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Noticia extends Model
{
    use HasFactory;

    const STATUS_ATIVO = "A";
    const STATUS_INATIVO = "I";
    const STATUS = [
        Noticia::STATUS_ATIVO => "Ativo",
        Noticia::STATUS_INATIVO => "Inativo"
    ];

    protected $table = 'noticias';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $dates = ['created_at', 'updated_at', 'data_publicacao'];

    public function getStatusFormatadoAttribute()
    {
        return Noticia::STATUS[$this->status];
    }

    public function setDataPublicacaoAttribute($value)
    {
        $this->attributes['data_publicacao'] = Carbon::createFromFormat("d/m/Y", $value)->format("Y-m-d");
    }
    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}
