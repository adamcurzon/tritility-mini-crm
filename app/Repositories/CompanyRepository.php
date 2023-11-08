<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Interfaces\ResourceRepositroyInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CompanyRepository implements ResourceRepositroyInterface
{
    const PER_PAGE = 10;
    const TABLE_NAME = 'companies';

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

    public function getEmployees(string $company_id)
    {
        return DB::table('employees')->where('company_id', $company_id)->get();
    }
}
