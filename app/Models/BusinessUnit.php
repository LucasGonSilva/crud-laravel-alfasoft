<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessUnit extends Model
{
    protected $fillable = ['company_id', 'name', 'location'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
