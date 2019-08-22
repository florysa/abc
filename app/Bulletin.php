<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    //
    protected $table = '48c5m_bulletins';

    protected $fillable = [
        'idEleve', 'matricule', 'idEtablissement'
    ];
}