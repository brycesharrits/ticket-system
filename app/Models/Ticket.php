<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Ticket extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'status',
        'priority',
        'agent_id',
    ];

    public function path() {
        return "/tickets/{$this->id}";
    }

    public function getPathAttribute() {
        return $this->path();
    }

    public function creator() {
        return $this->hasOne('App\Models\User', 'id', 'creator_id');
    }

    public function agent() {
        return $this->hasOne('App\Models\User', 'id', 'agent_id');
    }

    public function replies() {
        return $this->hasMany('App\Models\TicketReply', 'ticket_id', 'id')->orderBy('created_at', 'asc');
    }

    // public function attachments() {
    //     return $this->hasMany('App\Models\FileUpload', 'ref_id', 'id')->where('ref_type', 'ticket');
    // }
}