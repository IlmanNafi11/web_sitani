<?php
namespace App\Repositories;

use App\Models\BibitBerkualitas;
use App\Repositories\Interfaces\BibitRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class BibitBerkualitasRepository implements BibitRepositoryInterface{

    public function getAll(): Collection
    {
        return BibitBerkualitas::all();
    }
}
