<?php


namespace App\Repositories\Interfaces;
use App\Repositories\BaseRepositoryInterface;

interface AddressBookRepositoryInterface extends BaseRepositoryInterface
{
    public function getAddresses($user, $whom);
    public function trashed();
    public function restore($id);
}
