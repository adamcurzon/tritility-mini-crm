<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Interfaces\ResourceRepositroyInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EmployeeRepository implements ResourceRepositroyInterface
{
    const PER_PAGE = 10;
    const TABLE_NAME = 'employees';

    public function page(int $pageNumber): LengthAwarePaginator
    {
        return DB::table(self::TABLE_NAME)->paginate($pageNumber * self::PER_PAGE);
    }

    public function create($payload, string $id): string
    {
        return "id1";
    }

    public function read(string $id)
    {
        return DB::table(self::TABLE_NAME)->where('id', $id)->first();
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
