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
    protected $guarded = [];
    protected $casts = [
        'proposals' => 'array'
    ];
    // protected $appends = ['ujicoba_view'];
    // public function getUjicobaViewAttribute()
    // {
    //     return \Carbon\Carbon::parse($this->attributes['ujicoba'])
    //         ->isoFormat('D MMMM Y');
    // }
}
