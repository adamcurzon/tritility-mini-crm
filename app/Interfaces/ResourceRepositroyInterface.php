<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ResourceRepositroyInterface
{
    public function page(int $pageNumber): LengthAwarePaginator;
    public function create($payload): string;
    public function read(string $id);
    public function update(array $payload, string $id): bool;
    public function delete(string $id): bool;
}
