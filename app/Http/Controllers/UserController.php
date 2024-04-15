<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(UserRequest $request)
    {
        $validatedData = $request->validated();

        $user = $this->userService->register($validatedData);

        return view('dashboard.home');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(UserRequest $request)
    {
        $validatedData = $request->validated();

        $data = $this->userService->login($validatedData);

        if ($data['status'] == 1) {
            return view('dashboard.home');
        } else {
            return back()->with('error', $data['message']);
        }
    }

    public function logout(Request $request)
    {
        $data = $this->userService->logout();

        return redirect('login');
    }
}
