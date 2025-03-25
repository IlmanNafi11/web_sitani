<?php

namespace App\Repositories\Interfaces;

use App\Models\Komoditas;
use Illuminate\Database\Eloquent\Collection;

interface KomoditasRepositoryInterface
{
    /**
     * Mengambil seluruh data komoditas
     * @return Collection|array
     */
    public function getAll():Collection|array;

    /**
     * Mengambil data komoditas berdasarkan id
     * @param int $id komoditas id
     * @return Collection|array
     */
    public function getById($id): Komoditas|null;
}
