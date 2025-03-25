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
        $data = $this->komoditasRepository->getAll();
        if ($data) {
            return response()->json($data->makeHidden(['created_at', 'updated_at']));
        }
        return response()->json([
            'message' => 'Data is empty'
        ]);
    }

    public function getById($id): JsonResponse
    {
        $data = $this->komoditasRepository->getById($id);

        if (!$data) {
            return response()->json([
                'message' => 'Komoditas Not Found',
            ], 404);
        }

        return response()->json($data->makeHidden(['created_at', 'updated_at']));
    }
}
