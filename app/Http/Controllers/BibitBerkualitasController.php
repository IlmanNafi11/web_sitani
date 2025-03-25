<?php

namespace App\Http\Controllers;

use App\Services\BibitBerkualitasService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BibitBerkualitasController extends Controller
{
    protected BibitBerkualitasService $bibitBerkualitasService;

    public function __construct(BibitBerkualitasService $bibitBerkualitasService)
    {
        $this->bibitBerkualitasService = $bibitBerkualitasService;
    }

    /**
     * Mengambil seluruh data bibit berkulitas
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        return $this->bibitBerkualitasService->getAll();
    }
}
