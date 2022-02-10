<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id','name', 'paircode', 'authcode', 'mac_address', 'firmware', 'status', 'public_ip', 'internal_ip', 'port', 'last_seen_at', 'last_action_at', 'site_id', 'site_name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
