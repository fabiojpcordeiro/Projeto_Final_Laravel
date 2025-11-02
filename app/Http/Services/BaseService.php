<?php

namespace App\Http\Services;

use App\Interfaces\Service;
use App\Http\Repositories\BaseRepository;

abstract class BaseService implements Service
{
    protected BaseRepository $repository;

    public function __construct(BaseRepository $base_repository)
    {
        $this->repository = $base_repository;
    }
    public function all(){
        return $this->repository->all();
    }
    public function show(string $id){
        return $this->repository->show($id);
    }
    public function update($object, array $data){
        return $this->repository->update($object, $data);
    }
    public function destroy(string $id){
        return $this->repository->destroy($id);
    }
}
