<?php

namespace App\Http\Controllers;

use App\Models\User;
use crocodicstudio\crudbooster\helpers\CRUDBooster;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{



    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {


        try {
            $googleUser = Socialite::driver('google')->user();


            // Перевірка, чи користувач вже існує у вашій базі даних за допомогою email
            $user = User::where('email', $googleUser->email)->first();


            if ($user) {

                $users = User::where('email', $googleUser->email)->first();
                // dd($user);


                $priv = DB::table("cms_privileges")->where("id", $users->id_cms_privileges)->first();

                $roles = DB::table('cms_privileges_roles')->where('id_cms_privileges', $users->id_cms_privileges)->join('cms_moduls', 'cms_moduls.id', '=', 'id_cms_moduls')->select('cms_moduls.name', 'cms_moduls.path', 'is_visible', 'is_create', 'is_read', 'is_edit', 'is_delete')->get();

                $photo = ($users->photo) ? asset($users->photo) : asset('vendor/crudbooster/avatar.jpg');
                Session::put('admin_id', $users->id);
                Session::put('admin_is_superadmin', $priv->is_superadmin);
                Session::put('admin_name', $users->name);
                Session::put('admin_photo', $photo);
                Session::put('admin_privileges_roles', $roles);
                Session::put("admin_privileges", $users->id_cms_privileges);
                Session::put('admin_privileges_name', $priv->name);
                Session::put('admin_lock', 0);
                Session::put('theme_color', $priv->theme_color);
                Session::put("appname", get_setting('appname'));
                Session::put('me', 0);
                // Session::put("message_type",'success');
                // Session::put("message", 'Це повідомлення про успіх');
                // Session::put("appname", get_setting('appname'));

                CRUDBooster::insertLog(cbLang("log_login", ['email' => $users->email, 'ip' => Request::server('REMOTE_ADDR')]));
                

                $cb_hook_session = new \App\Http\Controllers\CBHook;
                $cb_hook_session->afterLogin();
                if (Session::get('url') != '') {
                    return redirect(url(Session::get('url')));
                }
                else{

                    return redirect(CRUDBooster::adminPath());
                }
            }
            if (!$user) {
                $random = rand(10000, 99999);
                DB::insert('insert into cms_users (name,email,password,id_cms_privileges,photo) values (?, ?, ?, ?, ?)', [$googleUser->name, $googleUser->email, Hash::make($random), 2, $googleUser->avatar]);
                $users = User::where('email', $googleUser->email)->first();
                // dd($user);


                $priv = DB::table("cms_privileges")->where("id", $users->id_cms_privileges)->first();

                $roles = DB::table('cms_privileges_roles')->where('id_cms_privileges', $users->id_cms_privileges)->join('cms_moduls', 'cms_moduls.id', '=', 'id_cms_moduls')->select('cms_moduls.name', 'cms_moduls.path', 'is_visible', 'is_create', 'is_read', 'is_edit', 'is_delete')->get();

                $photo = ($users->photo) ? asset($users->photo) : asset('vendor/crudbooster/avatar.jpg');
                Session::put('admin_id', $users->id);
                Session::put('admin_is_superadmin', $priv->is_superadmin);
                Session::put('admin_name', $users->name);
                Session::put('admin_photo', $photo);
                Session::put('admin_privileges_roles', $roles);
                Session::put("admin_privileges", $users->id_cms_privileges);
                Session::put('admin_privileges_name', $priv->name);
                Session::put('admin_lock', 0);
                Session::put('theme_color', $priv->theme_color);
                Session::put("appname", get_setting('appname'));
                Session::put('me', 0);
                
                Session::put("message_type",'success');
                Session::put("message", 'Якщо ви бачите це повідомлення це означає що ви новий користувач Event_O і ви зареєструвалися через <b>google</b>. У вас не створений пароль для входу створіть пароль або вам прийдеться входити лише через <b>google</b><br>
                Створити пароль можна в <a href="/admin/users/profile">Панелі профілю</a> ');

                CRUDBooster::insertLog(cbLang("log_login", ['email' => $users->email, 'ip' => Request::server('REMOTE_ADDR')]));

                $cb_hook_session = new \App\Http\Controllers\CBHook;
                $cb_hook_session->afterLogin();
                if (Session::get('url') != '') {
                    return redirect(url(Session::get('url')));
                }
                
                // CRUDBooster::redirect(CRUDBooster::adminPath(), cbLang('alert_update_data_success'), 'success');
                return redirect(CRUDBooster::adminPath());
            }


            // Перенаправлення після успішної автентифікації
        }
         catch (\Exception $e) {
            return redirect()->route('event')->with('error', 'Помилка автентифікації через Google.');
        }
    }
}
