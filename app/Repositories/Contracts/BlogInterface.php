<?php
namespace App\Repositories\Contracts;

interface BlogInterface
{
    
    public function all();

    public function find(int $id);
    
    public function store();

    public function update(int $id);

    public function destroy(int $id); 

    public function deleteRows($request);

}
