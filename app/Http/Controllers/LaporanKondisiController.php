<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaporanKondisiRequest;
use App\Services\LaporanKondisiService;
use Illuminate\Http\Request;

class LaporanKondisiController extends Controller
{
    protected LaporanKondisiService $laporanKondisiService;

    public function __construct(LaporanKondisiService $laporanKondisiService)
    {
        $this->laporanKondisiService = $laporanKondisiService;
    }
    public function sendReport(LaporanKondisiRequest $request)
    {
        $validated = $request->validated();

        $laporanKondisi = $this->laporanKondisiService->saveLaporan($validated);

        if ($laporanKondisi) {
            return response()->json([
                'message' => 'Report sent successfully',
                'data' => $laporanKondisi,
            ], 201);
        }
    }
}
