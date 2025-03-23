<?php

namespace App\Http\Controllers\Authentication;

use App\Rules\PhoneRules;
use App\services\AuthPhoneService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthPhoneController extends Controller
{
    protected $authPhoneService;
    public function __construct(AuthPhoneService $authPhoneService)
    {
        $this->authPhoneService = $authPhoneService;
    }

    public function checkPhone(Request $request)
    {
        if (!$request->has('phone')) {
            return response()->json([
                "message" => "Phone number is required"
            ], 400);
        }

        $request->validate([
            'phone' => [new PhoneRules()]
        ]);

        $user = $this->authPhoneService->authenticate($request->phone);

        if (!$user) {
            return response()->json([
                "message" => "Nomor telepon tidak terdaftar"
            ], 404);
        }

        return response()->json([$user]);
    }
}
