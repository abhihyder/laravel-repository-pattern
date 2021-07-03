<?php


namespace App\Repositories\Interfaces;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;

interface ParcelCategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function datatable(Request $request);
}
