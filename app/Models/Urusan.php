<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    use HasFactory;
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
        ->isoFormat('D MMMM Y');
    }

    protected $guarded = [];
}
