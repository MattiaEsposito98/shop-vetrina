<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    protected $table = 'prodotti'; // se la tabella si chiama "prodotti"

    protected $fillable = [
        'nome',
        'descrizione',
        'prezzo',
        'immagine',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
