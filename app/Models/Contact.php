<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'organization_id',
     'phone', 'address', 'city', 'state'];


     public function organization()
     {
        return $this->belongsTo(Organization::class);
     }

}
