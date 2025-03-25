<?php
namespace App\Repositories;

use App\Models\KelompokTani;
use App\Repositories\Interfaces\KelompokTaniRepositoryInterface;

class KelompokTaniRepository implements KelompokTaniRepositoryInterface{

    public function getAllByPenyuluh($id): mixed
    {
        return KelompokTani::whereHas('penyuluhTerdaftar', function ($query) use ($id) {
            $query->whereIn('penyuluh_terdaftars.id', $id);
        })->with('penyuluhTerdaftar')->get();
    }

    public function getById($id): KelompokTani
    {
        return KelompokTani::where('id', $id)->first();
    }
}
