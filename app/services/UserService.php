<?php
namespace App\services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Rules\PhoneRules;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class UserService
{
    protected UserRepositoryInterface $userRepository;
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        $this->userRepository = $userRepositoryInterface;
    }

    /**
     * Mengambil data user berdasarkan user id
     * @param mixed $id
     * @return JsonResponse
     */
    public function getById($id): JsonResponse
    {
        $user = $this->userRepository->getById($id);
        if (!$user) {
            return response()->json([
                "message" => "User Not Found"
            ], 404);
        }

        return response()->json([$user]);
    }
}
