<?php
namespace App\Services;

use App\Repositories\Interfaces\KelompokTaniRepositoryInterface;

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

        return response()->json($kelompokTani->except('pivot'));
    }
}
