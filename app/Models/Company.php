<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contacts(){
        return $this->hasMany(Contact::class);
    }

    public function status(){
        return $this->hasOne(CompanyStatus::class);
    }

    public function type(){
        return $this->hasOne(CompanyType::class);
    }
}
