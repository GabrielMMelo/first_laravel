<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generatePassword()
    {
      // Generate random string and encrypt it. 
//      return bcrypt(str_random(15));
	return str_random(15);
    }
    public static function sendWelcomeEmail($user, $pw)
    {
      // Generate a new reset password token
      $token = app('auth.password.broker')->createToken($user);
      
      // Send email
      Mail::send('email.welcome', ['user' => $user->name, 'pass' => $pw], function ($m) use ($user) {
        $m->from('hello@appsite.com', 'Emakers Júnior');
        $m->to($user->email, $user->name)->subject('Bem-vindo à Diretoria Executiva da Emakers Júnior!');
     });
    }

}
