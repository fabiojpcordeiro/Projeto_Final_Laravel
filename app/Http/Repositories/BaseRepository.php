<?php

namespace App\Http\Repositories;

use App\Interfaces\Repository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements Repository
{
    protected Model $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function all(){
        return $this->model->all();
    }
    public function store(array $data){
        return $this->model->create($data);
    }
    public function show(string $id){
        return $this->model->findOrFail($id);
    }
    public function update($object , array $data){
        $object->update($data);
        return $object->fresh();
    }
    public function destroy(string $id){
        return $this->show($id)->delete();
    }
}
