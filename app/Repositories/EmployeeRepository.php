<?php

namespace App\Repositories;

use App\Interface\ResourceRepositroyInterface;

class EmployeeRepository extends ResourceRepositroyInterface
{
    public function page(int $pageNumber): array
    {
        return [];
    }

    public function create($payload, string $id): string
    {
        return "id1";
    }

    public function read(string $id)
    {
        return [];
    }

    public function update(string $id): bool
    {
        return true;
    }

    public function delete(string $id): bool
    {
        return true;
    }
}
