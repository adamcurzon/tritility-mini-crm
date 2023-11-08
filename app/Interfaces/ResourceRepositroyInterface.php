<?php

namespace App\Interface;

interface ResourceRepositroyInterface
{
    public function page(int $pageNumber): array;
    public function create($payload, string $id): string;
    public function read(string $id);
    public function update(string $id): bool;
    public function delete(string $id): bool;
}
