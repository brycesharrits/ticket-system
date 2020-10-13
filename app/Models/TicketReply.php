<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class TicketReply extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    public function creator() {
        return $this->hasOne('App\Models\User', 'id', 'creator_id');
    }

    public function ticket() {
        return $this->hasOne('App\Models\Ticket', 'id', 'ticket_id');
    }
    // public function attachments() {
    //     return $this->hasMany('App\Models\FileUpload', 'ref_id', 'id')->where('ref_type', 'reply');
    // }
}
