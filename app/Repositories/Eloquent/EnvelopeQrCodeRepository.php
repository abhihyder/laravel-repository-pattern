<?php


namespace App\Repositories\Eloquent;

use App\Models\Ship\EnvelopeQrCode;
use App\Repositories\Interfaces\EnvelopeQrCodeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class EnvelopeQrCodeRepository extends AbstractRepository implements EnvelopeQrCodeRepositoryInterface
{
    public function __construct(EnvelopeQrCode $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->model->find($id)->update($attributes);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function datatable(\Illuminate\Http\Request $request)
    {
        $envelopeQrCodes = DB::table('envelope_qr_codes')
            ->get();
        return $envelopeQrCodes;
    }
}
