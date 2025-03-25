<?php

use App\Models\BibitBerkualitas;
use App\Repositories\Interfaces\BibitRepositoryInterface;

class BibitBerkualitasRepository implements BibitRepositoryInterface{

    public function getAll(): Illuminate\Database\Eloquent\Collection|null
    {
        return BibitBerkualitas::all();
    }
}
