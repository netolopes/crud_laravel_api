<?php

namespace App\Repositories\Contracts;

interface IUserRepository
{
    public function list();
    public function add(string $name, string $email, string $password, string $full_name,bool $is_admin);
    public function listBy(int $id);
    public function edit(int $id, string $name, string $email, string $password, string $full_name,bool $is_admin);
    public function delete(int $id);
}
