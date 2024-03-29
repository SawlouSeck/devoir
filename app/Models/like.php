<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $fillable = ['user_id', 'candidat_id', 'type'];

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }


}
