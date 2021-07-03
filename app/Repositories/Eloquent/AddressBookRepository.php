<?php


namespace App\Repositories\Eloquent;


use App\Models\Ship\AddressBook;
use App\Repositories\Interfaces\AddressBookRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AddressBookRepository extends AbstractRepository implements AddressBookRepositoryInterface
{
    public function __construct(AddressBook $addressBook)
    {
        $this->model = $addressBook;
    }

    public function getAddresses($user, $whom)
    {
        $myAddress = DB::table('address_books')
            ->leftJoin('countries', 'address_books.country_id', 'countries.id')
            ->leftJoin('states', 'address_books.state_id', 'states.id')
            ->leftJoin('cities', 'address_books.city_id', 'cities.id')
            ->select(
                'address_books.id',
                'address_books.name',
                'address_books.email',
                'address_books.address',
                'address_books.postal_code',
                'address_books.contact_number',
                'address_books.country_id',
                'address_books.state_id',
                'address_books.city_id',
                'address_books.is_self',
                'address_books.address_type',

                'countries.name as country_name',
                'states.name as state_name',
                'cities.name as city_name'
            )->whereNull('deleted_at')
            ->where('user_id', $user)
            ->where('is_self', $whom)
            ->get();
        return $myAddress;
    }


    public function getAll()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }


    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->model->find($id);
        if($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->model->find($id);
        if($result) {
            $result->delete();
            return true;
        }
        return false;
    }

    public function trashed()
    {
        $trashed = $this->model->onlyTrashed()->get();
        return $trashed;
    }

    public function restore($id)
    {
        $trashed = $this->model->onlyTrashed()->find($id);
        if($trashed) {
            $trashed->restore();
            return true;
        }
        return false;
    }


}
