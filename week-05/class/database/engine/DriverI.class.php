<?php 
namespace database\engine; // database\engine namespace

interface DriverI
{
    public function all(String $table): array; // Return all table values as an array
    public function find(String $table, mixed $id): mixed; // Find table with given table name and id
    public function create(String $table, array $values): bool; // Create new table with given values as an array
    public function update(String $table, mixed $id, array $values): bool; // Update table with given id and values as an array
    public function delete(String $table, mixed $id): bool; // Delete table with given id
}