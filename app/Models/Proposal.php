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
    public function urusan(){
        return $this->belongsTo(Urusan::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function skpd(){
        return $this->belongsTo(Skpd::class);
    }
    public function getUjicobaAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['ujicoba'])
        ->isoFormat('D MMMM Y');
    }
    public function getImplementasiAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['implementasi'])
        ->isoFormat('D MMMM Y');
    }
    protected $guarded = [];
}
