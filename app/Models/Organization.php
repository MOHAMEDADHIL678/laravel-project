<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone',
                     'address', 'city', 'state',
                      'country', 'postalcode'];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

}    
