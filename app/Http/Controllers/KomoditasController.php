<?php

namespace App\Http\Controllers;

use App\Services\KomoditasService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KomoditasController extends Controller
{
    protected KomoditasService $komoditasService;

    public function __construct(KomoditasService $komoditasService)
    {
        $this->komoditasService = $komoditasService;
    }

    /**
     * Mengambil seluruh data komoditas
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        return $this->komoditasService->getAll();
    }

    /**
     * Mengambil data komoditas berdasarkan id
     * @param int $id id komoditas
     * @return JsonResponse
     */
    public function getById($id): JsonResponse
    {
        return $this->komoditasService->getById($id);
    }
}
