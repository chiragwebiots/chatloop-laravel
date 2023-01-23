<?php
namespace App\Repositories\Contracts;

interface TestimonialInterface
{
    
    public function all();

    public function find(int $id);
    
    public function store();

    public function update(int $id);

    public function destroy(int $id); 

}
