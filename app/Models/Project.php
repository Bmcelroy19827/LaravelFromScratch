<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class); // Select * from user where project_id = $this->id
    }

}

// hasOne
// hasMany
// belongsTo
// belongsToMany // related to Link Tables (many to many relationships)
// morphMany
// morphToMany
