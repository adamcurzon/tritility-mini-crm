<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Interfaces\ResourceRepositroyInterface;
use App\Models\Employee;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CompanyRepository implements ResourceRepositroyInterface
{
    const PER_PAGE = 10;
    const TABLE_NAME = 'companies';

    public function page(int $pageNumber): LengthAwarePaginator
    {
        return DB::table(self::TABLE_NAME)->orderBy('created_at', 'desc')->paginate($pageNumber * self::PER_PAGE);
    }

    public function create($payload): string
    {
        $company = Company::create($payload);
        return $company->id;
    }

    public function read(string $id)
    {
        return Company::where('id', $id)->with('employee')->first();
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
        $company = Company::where('id', $id)->first();
        $company->employee()->delete();
        $company->delete();
        return true;
    }

    public function selectInput(): array
    {
        return DB::table(self::TABLE_NAME)
            ->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }
}
