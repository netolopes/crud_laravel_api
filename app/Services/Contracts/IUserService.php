<?php

namespace App\Services\Contracts;

interface IUserService
{
    public function list();
    public function add(string $name, string $email, string $password, string $full_name,bool $is_admin);
    public function listBy(int $id);
    public function edit(int $id, string $name, string $email, string $password, string $full_name,bool $is_admin);
    public function delete(int $id);
}
