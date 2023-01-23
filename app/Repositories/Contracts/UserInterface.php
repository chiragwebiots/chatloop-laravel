<?php
namespace App\Repositories\Contracts;

interface UserInterface
{
    
    public function all();

    public function find(int $id);
    
    public function store();

    public function update(int $id);

    public function updatePassword(int $id);

    public function destroy(int $id); 

    public function deleteRows($request);
    
}
