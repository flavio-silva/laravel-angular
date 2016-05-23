<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class OAuthClient extends Model
{
    protected $fillable = ['id', 'secret', 'name'];
    protected $table = 'oauth_clients';
}
