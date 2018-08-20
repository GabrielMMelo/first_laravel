<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;
use DB;
use App\Job;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'name',
        'job',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generatePassword(){
        // Generate random string and encrypt it.
        //  return bcrypt(str_random(15));
        return str_random(15);
    }

    public static function sendWelcomeEmail($user, $pw){
      // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($user);
      
      // Send email
        Mail::send('email.welcome', ['user' => $user->name, 'pass' => $pw], function ($m) use ($user) {
            $m->from('hello@appsite.com', 'Emakers Júnior');
            $m->to($user->email, $user->name)->subject('Bem-vindo à Diretoria Executiva da Emakers Júnior!');
        });
    }

    public static function sendAdvertenciaEmail($warning, $warningTypeName){
        $user = User::where('name', '=', $warning->penalized)->get();
        $user = $user[0];
        // Send email
        Mail::send('email.warning', ['user' => $warning->penalized, 'warningTypeName' => $warningTypeName, 'warning' =>$warning], function ($m) use ($user) {
            $m->from('hello@appsite.com', 'Emakers Júnior');
            $m->to($user->email, $user->name)->subject(':( Você recebeu uma advertência da Emakers Júnior!');
        });
    }

    public static function isDirex($user){
        return Job::where('id', $user['job'])->get()->first()->direx;
    }

    public static function isPresident($user){
        if (Job::where('id', $user['job'])->get()->first()->id == Job::where('name', "Diretor Presidente")->get()->first()->id)
            return true;
        else
            return false;
    }

    public static function isInternalProcesses($user){
        if (Job::where('id', $user['job'])->get()->first()->id == Job::where('name', "Diretor de Processos Internos")->get()->first()->id)
            return true;
        else
            return false;
    }
}

