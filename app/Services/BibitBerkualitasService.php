<?php
namespace App\Services;

use App\Repositories\Interfaces\BibitRepositoryInterface;
use Illuminate\Http\JsonResponse;

class BibitBerkualitasService{
    protected BibitRepositoryInterface $bibitRepository;

    public function __construct(BibitRepositoryInterface $bibitRepository)
    {
        $this->bibitRepository = $bibitRepository;
    }

    /**
     * Mengambil seluruh data bibit berkulitas
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $data = $this->bibitRepository->getAll();
        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'Bibit Berkualitas is Empty'
            ], 404);
        }

        return response()->json($data->makeHidden(['created_at', 'updated_at']));
    }
}
