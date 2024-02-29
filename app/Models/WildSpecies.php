<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WildSpecies extends Model
{
    protected $guarded = [];
    public function wildLife()
    {
        return $this->belongsTo(WildlifeList::class,'id','wildlifetype_id');
    }
}
