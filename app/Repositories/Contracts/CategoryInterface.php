<?php
namespace App\Repositories\Contracts;

interface CategoryInterface
{
    
    public function all();

    public function find(int $id);

    public function getHierarchy();
    
    public function store();

    public function update(int $id);

    public function destroy(int $id); 

}
