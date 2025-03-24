<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    /**
     * Mengambil seluruh data user
     * @return mixed
     */
    public function getAll(): mixed;

    /**
     * Mengambil data user berdasarkan id
     * @param $id
     * @return mixed
     */
    public function findById($id): mixed;


    /**
     * Membuat resource baru
     * @param array $data data user baru
     * @return mixed
     */
    public function create(array $data): mixed;

    /**
     * Memperbarui data user
     * @param array $data data user
     * @return mixed
     */
    public function update(array $data): mixed;


    /**
     * Menghapus user berdasarkan id
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed;
}
