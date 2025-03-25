<?php
namespace App\Repositories;

use App\Models\Komoditas;
use App\Repositories\Interfaces\KomoditasRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class KomoditasRepository implements KomoditasRepositoryInterface{

    public function getAll(): array|Collection
    {
        return Komoditas::all();
    }

    
    public function getById($id): Collection|array|null
    {
        return Komoditas::where('id', $id)->first();
    }
}
