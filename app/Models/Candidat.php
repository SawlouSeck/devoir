<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    protected $fillable = [
        'Nom',
        'Prenom',
        'Parti',
        'Biographie',
        'Validate',
        'Photo',
        'like_count',
    ];

        public function programmes(){
            return $this->hasMany(Programme::class);
        }
        public function likes()
{
    return $this->hasMany(Like::class);
}

}
