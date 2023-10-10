<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function bentuk(){
        return $this->belongsTo(Bentuk::class);
    }
    public function urusans(){
        return $this->belongsToMany(Urusan::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function skpd(){
        return $this->belongsTo(Skpd::class);
    }
    public function files() {
        return $this->hasMany(File::class);
    }
    public function tematik(){
        return $this->belongsTo(Tematik::class);
    }
    protected $guarded = [];
    protected $casts = [
        'proposals' => 'array'
    ];
}
