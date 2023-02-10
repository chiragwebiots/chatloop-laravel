<?php
namespace App\Repositories\Contracts;

interface SocialLinkInterface
{
       
    public function store();

    public function update(int $id);

    public function destroy(int $id); 

    public function deleteRows($request);
}
