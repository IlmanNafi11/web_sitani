<?php
namespace App\Services;

use App\Repositories\Interfaces\KomoditasRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class KomoditasService{
    protected KomoditasRepositoryInterface $komoditasRepository;
    public function __construct(KomoditasRepositoryInterface $komoditasRepository)
    {
        $this->komoditasRepository = $komoditasRepository;
    }

    public function getAll():JsonResponse
    {
        return response()->json($this->komoditasRepository->getAll());
    }

    public function getById($id): JsonResponse
    {
        $data = $this->komoditasRepository->getById($id);
        if (!$data) {
            return response()->json([
                'message' => 'Komoditas Not Found',
            ]);
        }

        return response()->json([$data]);
    }
}
