<?php
namespace App\Repositories\Contracts;

interface MediaInterface
{
    
    public function all();

    public function store();

    public function destroy(int $id);
    
}
