<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Redirect;
use Auth;
class RegisterControllerAdmin extends Controller
{
  public function store(Request $request)
  {
      if (User::isDirex(Auth::user())) {
        $validator = Validator::make($request->all(), [
          'name'  => 'required|max:255',
          'email' => 'required|email|unique:users',
        ]);
        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
          return back()
            ->withErrors($validator)
            ->withInput();
        }
        //generate a password for the new users
        $pw = User::generatePassword();
        //add new user to database
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($pw);
        $user->save();
        User::sendWelcomeEmail($user, $pw);
        return redirect()->back()->with(['msg' => "Dados enviados com Sucesso!", 'emoji' => Emoji::findByName('smile') ]);
      }
 
      else {
        return redirect()->back()->with(['msg' => 'Você não possui permissão pra isso! ', 'color' => 'red', 'emoji' => "\u{1F631}" ]);   
      }
  }
}
