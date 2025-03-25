<?php

namespace App\Repositories\Interfaces;

use App\Models\KelompokTani;
use Illuminate\Database\Eloquent\Collection;

interface KelompokTaniRepositoryInterface
{
    /**
     * Mengambil seluruh data kelompok tani berdasarkan penyuluh terdaftar id
     * @param int $id ID penyuluh terdaftar
     * @return mixed
     */
    public function getAllByPenyuluh($id): mixed;

    /**
     * Mengambil data kelompok tani berdasarkan id
     * @param int $id ID kelompok tani
     * @return KelompokTani
     */
    public function getById($id): KelompokTani;
}
