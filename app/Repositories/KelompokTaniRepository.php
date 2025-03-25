<?php

use App\Models\KelompokTani;
use App\Repositories\Interfaces\KelompokTaniRepositoryInterface;

class KelompokTaniRepository implements KelompokTaniRepositoryInterface{

    public function getAllByPenyuluh($id): Illuminate\Database\Eloquent\Collection
    {
        return KelompokTani::with('penyuluhTerdaftar')->where('id', $id)->get();
    }

    public function getById($id): KelompokTani
    {
        return KelompokTani::where('id', $id)->first();
    }
}
