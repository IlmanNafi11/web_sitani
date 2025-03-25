<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdFormRequest;
use Illuminate\Http\Request;
use App\Services\UserService;


class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Mengambil data user berdasarkan user id
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserById($id)
    {
        return $this->userService->getById($id);
    }
}
