<?php


namespace App\Repositories\Interfaces;
use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;

interface EnvelopeQrCodeRepositoryInterface extends BaseRepositoryInterface
{
    public function datatable(Request $request);
}
