<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\SetingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminCmsRegisterUsers extends Controller
{
   public function add(Request $request)
    {
    	$dani=DB::table('cms_users')->where('email',$request->email)->first();
    	if ($dani->email==$request->email) {
    		 return redirect("/admin/registerl")->with('message', trans($request->email." користувач з таким email вже зареєстровано. Імя користувача ".$dani->name." якщо це ваше імя увійдіть, або відновіть пароль"));
    	}
    	if ($request->password2!=$request->password) {
    		return redirect("/admin/registerl")->with('message', trans("Паролі не співпадають. Будьте уважніші."));
    	}
    	else{
    	DB::insert('insert into cms_users (name,email,password,id_cms_privileges) values (?, ?, ?, ?)', [$request->name,$request->email,Hash::make($request->password),2]);

        return redirect()->route('getLogin')->with('message', trans($request->name." вітаємо ви успішно зареєструвалися на EVENT-O тепер увійдіть на сайт. Ваш Email: $request->email".' Пароль:'.$request->password));
        }
    }
}
