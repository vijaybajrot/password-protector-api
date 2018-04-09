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

    public function toArray()
    {
        return [
            "id" => $this->id,
            "website" => $this->website,
            "username" => $this->username,
            "password" => $this->password,
            "hashed_password" => base64_encode($this->password),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
