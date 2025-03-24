<?php

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{

    /**
     * @inheritDoc
     */
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
    }

    /**
     * @inheritDoc
     */
    public function findById($id): mixed
    {
        return User::where('id', $id)->first();
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): mixed
    {
        return User::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(array $data): bool
    {
        return User::where('id', $data['id'])->update($data);
    }

    /**
     * @inheritDoc
     */
    public function delete($id): mixed
    {
        return User::where('id', $id)->delete();
    }
}
