<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Authファサードをインポート

class AuthController extends Controller
{
    public function create()
    {
        return view('/register');
    }

    public function store(Request $request)
    {
          // リクエストデータの取得
        $user = $request->only(['name', 'email', 'password']);

        // パスワードのハッシュ化
        $user['password'] = Hash::make($user['password']);

         // 取得したデータを確認
         //dd($user);

         User::create($user);

        //return redirect('/login');
        return view('/login');
    }

        public function showLoginForm()
    {
        return view('/login'); // ビューのパスに応じて修正
    }

    //ログインの認証
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    //管理画面の表示
    public function index()
    {
        //$contacts = Contact::all();
        //return view('admin', compact('contacts'));
        $contacts = Contact::with('category')->paginate(10);
        return view('/admin', compact('contacts'));
    }

        public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

}