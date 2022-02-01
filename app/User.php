<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\MailLayoutButton;
use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photoPath', 'subscribed_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function roles() {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    public function badges() {
        return $this->belongstoMany('App\Badge', 'badge_user');
    }

    public function partner() {
        return $this->belongsTo('App\Partner');
    }

    public function shifter() {
        return $this->hasOne('App\Shifter');
    }

    public function eventsAttending() {
        return $this->belongstoMany('App\Event', 'event_attendant', 'user_id', 'event_id');
    }

    public function eventsSpeaking() {
        return $this->belongstoMany('App\Event', 'event_speaker', 'user_id', 'event_id');
    }

    public function isAdmin() {
        return $this->roles()->whereName('admin')->count() > 0 ? true : false;
    }

    public function isStaff() {
        return $this->roles()->whereName('staff')->count() > 0 ? true : false;
    }

    public function isShifter() {
        return $this->roles()->whereName('shifter')->count() > 0 ? true : false;
    }

    public function isUser() {
        return $this->roles()->whereName('user')->count() > 0 ? true : false;
    }

    public function isSpeaker() {
        return $this->roles()->whereName('speaker')->count() > 0 ? true : false;
    }

    public function isJury() {
        return $this->roles()->whereName('jury')->count() > 0 ? true : false;
    }

    public function isPartner(){
        return $this->roles()->where('name', 'like', '%-partner')->count() > 0 ? true : false;
    }

    public function isGoldPartner() {
        return $this->roles()->whereName('gold-partner')->count() > 0 ? true : false;
    }

    public function isSilverPartner() {
        return $this->roles()->whereName('silver-partner')->count() > 0 ? true : false;
    }

    public function isStudent() {
        return $this->student;
    }

    public function sendPasswordResetNotification($token) {
        $mail = new MailLayoutButton('[Shift APPens] Recuperar Password', 'Recuperar Password', 'Clica no botão para poderes alterar a tua password.', url('auth/password/reset', $token), 'Recuperar Password');
        Mail::to($this->email)->send($mail);
    }
}
