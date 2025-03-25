<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface BibitRepositoryInterface
{
    /**
     * Mengambil seluruh data bibit berkualitas
     * @return Collection
     */
    public function getAll():?Collection;
}
