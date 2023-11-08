<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Interfaces\ResourceRepositroyInterface;
use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EmployeeRepository implements ResourceRepositroyInterface
{
    const PER_PAGE = 10;
    const TABLE_NAME = 'employees';

    public function page(int $pageNumber): LengthAwarePaginator
    {
        return DB::table(self::TABLE_NAME)->orderBy('created_at', 'desc')->paginate($pageNumber * self::PER_PAGE);
    }

    public function create($payload): string
    {
        $employee = Employee::create($payload);
        return $employee->id;
    }

    public function read(string $id)
    {
        return Employee::where('id', $id)->with('company')->first();
    }

    public function update(array $payload, string $id): bool
    {
        DB::table(self::TABLE_NAME)
            ->where('id', $id)
            ->update($payload);
        return true;
    }

    public function delete(string $id): bool
    {
        $employee = Employee::where('id', $id)->first();

        if (!$employee) {
            return false;
        }

        $employee->delete();
        return true;
    }
}
