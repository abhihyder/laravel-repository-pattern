<?php


namespace App\Repositories\Interfaces;

use \App\Repositories\BaseRepositoryInterface;

interface ParcelRepositoryInterface extends BaseRepositoryInterface
{
    public function trashed();
    public function restore($id);
}
