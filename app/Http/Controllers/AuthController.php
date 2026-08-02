<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\StoreUserRequest;
use App\Repositories\Interfaces\AuthRepositoryInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthRepositoryInterface $authRepositoryInterface
    ) {}

    public function register(StoreUserRequest $request)
    {
        return $this->authRepositoryInterface->register($request);
    }


    public function login(LoginRequest $request)
    {
        return $this->authRepositoryInterface->login($request);
    }

    public function logout(Request $request)
    {
        return $this->authRepositoryInterface->logout($request);
    }
}
