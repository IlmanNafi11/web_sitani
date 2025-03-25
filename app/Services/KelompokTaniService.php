<?php
namespace App\Services;

use App\Repositories\Interfaces\KelompokTaniRepositoryInterface;
use Illuminate\Http\JsonResponse;

class KelompokTaniService{
    protected KelompokTaniRepositoryInterface $kelompokTaniRepository;

    public function __construct(KelompokTaniRepositoryInterface $kelompokTaniRepository)
    {
        $this->kelompokTaniRepository = $kelompokTaniRepository;
    }

    public function getAllByPenyuluh($id)
    {
        $kelompokTani = $this->kelompokTaniRepository->getAllByPenyuluh($id);
        if ($kelompokTani->isEmpty()) {
            return response()->json([
                'message' => 'Kelompok Tani Not Found'
            ], 404);
        }

        return response()->json($kelompokTani);
    }

    public function getById($id): JsonResponse
    {
        $kelompokTani = $this->kelompokTaniRepository->getById($id);
        if (!$kelompokTani) {
            return response()->json([
                'message' => 'Kelompok Tani Not Found'
            ]);
        }

        return response()->json($kelompokTani->makeHidden('created_at', 'updated_at'));
    }
}
