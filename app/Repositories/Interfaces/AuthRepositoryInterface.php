<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\StoreUserRequest;
use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function register(StoreUserRequest $request);

    public function login(LoginRequest $request);

    public function logout(Request $request);
}
