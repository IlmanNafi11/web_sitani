<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KelompokTaniService;

class KelompokTaniController extends Controller
{
    protected KelompokTaniService $kelompokTaniService;

    public function __construct(KelompokTaniService $kelompokTaniService)
    {
        $this->kelompokTaniService = $kelompokTaniService;
    }
    public function getAllByPenyuluh(Request $request)
    {
        $id = $request->query('id');
        return $this->kelompokTaniService->getAllByPenyuluh($id);
    }
}
