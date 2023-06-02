<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;

class LoginController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function do_login(){
        if(Session::has('user_id')){
            return redirect('home');
        }
        $error = array();
        if(!empty(Request::post('username')) && !empty(Request::post('password'))){
            $user = User::where('username', Request::post('username'))->first();
            if(!$user){
                $error['username'] = "Username non trovato";
            } else {
                if(!password_verify(Request::post('password'), $user->password)){
                    $error['password'] = "Password errata";
                }
            }
        } else {
            $error['username'] = "Inserisci username e password";
        }
        if(count($error) == 0){
            Session::put('user_id', $user->id);
            return redirect('home');
        } else {
            #dd($error);
            return redirect('login')->withInput()->withErrors($error);
        }
    }

    public function signup()
    {
        return view('signup');
    }

    public function check($field)
    {
        if(empty(Request::get('q'))) {
            return ['exists' => false];
        }
        $user = User::where($field, Request::get('q'))->first();
        return ['exists' => $user ? true : false];
    }

    public function do_signup()
    {
        if(Session::has('user_id')) {
            return redirect('home');
        }   
        
        $error = array();
    
        // Verifica l'esistenza di dati POST
        if (!empty(Request::get("username")) && !empty(Request::get("password")) && !empty(Request::get('email')) && !empty(Request::get('name')) && 
            !empty(Request::get('surname')) && !empty(Request::get('confirm_password')) && !empty(Request::get('allow')))
        {
            
            # USERNAME
            // Controlla che l'username rispetti il pattern specificato
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
                $error['username'] = "Username non valido";
            } else {
                if(User::where('username', Request::get('username'))->first())
                {
                    dd(User::where('username', Request::get('username'))->first());
                    $error['username'] = "Username già utilizzato";
                }
            }
            # PASSWORD
            if (strlen(Request::get("password")) < 8) {
                $error['password'] = "Caratteri password insufficienti";
            } 
            # CONFERMA PASSWORD
            if (Request::get('password') != Request::get('confirm_password')) {
                $error['password'] = "Le password non coincidono";
            }
            # EMAIL
            if (!filter_var(Request::get('email'), FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email non valida";
            } else {
                if(User::where('email', Request::get('email'))->first())
                {
                    $error['email'] = "Email già utilizzata";
                }
            }
    
            # UPLOAD DELL'IMMAGINE DEL PROFILO  
            $file_destination = null;
            if (count($error) == 0) { 
                $file = Request::file('avatar');
                if ($file && $file->getSize() > 0) {
                    $type = exif_imagetype($file->path());
                    $allowedExt = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
                    if (isset($allowedExt[$type])) {
                        if ($file->getSize() < 7000000) {
                            $file_destination = $file->store();
                        } else {
                            $error['avatar'] = "L'immagine non deve avere dimensioni maggiori di 7MB";
                        }
                    } else {
                        $error['avatar'] = "I formati consentiti sono .png, .jpeg, .jpg e .gif";
                    }
                }
            }

            # REGISTRAZIONE NEL DATABASE
            if (count($error) == 0) {
                $password = password_hash(Request::get('password'), PASSWORD_BCRYPT);
    
                $user = new User;
                $user->username = Request::get('username');
                $user->password = $password;
                $user->name = Request::get('name');
                $user->surname = Request::get('surname');
                $user->email = Request::get('email');
                $user->propic = $file_destination;
                $user->save();
                Session::put('user_id', $user->id);
                return redirect('home');
            }

        }
        else {
            $error[] = "Compila tutti i campi";
        }
        return redirect('signup')->withInput()->withErrors($error);
    }



}
