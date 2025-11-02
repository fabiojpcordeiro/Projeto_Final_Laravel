<?php

namespace App\Interfaces;

use DragonCode\Contracts\Cashier\Resources\Model;

interface Service
{
    public function show(string $id);
    public function update(Model $object,  array $data);
    public function destroy(string $id);
}
