<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable=['company_id','dni','nombre','email'];

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
