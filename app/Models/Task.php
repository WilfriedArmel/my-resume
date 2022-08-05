<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ["code", "nom", "description", "auteur"];

    // Relation one to many avec l'utilisateur
    public function author()
    {
        return $this->belongsTo(User::class, 'auteur');
    }

    // Relation many to many avec les catégories
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
