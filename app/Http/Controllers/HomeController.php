<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Aluno;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->aluno_id) {
            $aluno = Aluno::find($user->aluno_id);
            return view('profile')->with(['user'=>$user, 'aluno'=>$aluno]);
        }
        return view('home];')->with(['user'=>$user]);
    }
}
