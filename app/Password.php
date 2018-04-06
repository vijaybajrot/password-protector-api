<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    protected $fillable = ["website","username","password"];
    
    protected function findByDomain($domain)
    {
        return static::where("website",$domain)->first();
    }
}
