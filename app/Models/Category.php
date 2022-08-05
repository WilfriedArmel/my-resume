<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Relation many to many avec les tâches
    public function taches()
    {
        return $this->belongsToMany(Task::class);
    }

    public function scopeInfo($query)
    {
        $query->where('type', 'Info');
    }

    public function scopeGraphisme($query)
    {
        $query->where('type', 'Graphisme');
    }
}
