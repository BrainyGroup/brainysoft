<?php

namespace BrainySoft\Repositories;

use BrainySoft\Bank;
use BrainySoft\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use BrainySoft\Contracts\BankContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;


/**
 * Class BankRepository
 *
 * @package \BrainySoft\Repositories
 */
class BankRepository extends BaseRepository implements BankContract
{
    use UploadAble;

    /**
     * BankRepository constructor.
     * @param Bank $model
     */
    public function __construct(Bank $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    public function listBanks(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findBankById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Bank|mixed
     */
    public function createBank(array $params)
    {
        try {
            $collection = collect($params);
            
            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'banks');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));

            $bank = new Bank($merge->all());

            $bank->save();

            return $bank;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBank(array $params)
    {
        $bank = $this->findBankById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($bank->image != null) {
                $this->deleteOne($bank->image);
            }

            $image = $this->uploadOne($params['image'], 'categories');
        }

        $featured = $collection->has('featured') ? 1 : 0;
        $menu = $collection->has('menu') ? 1 : 0;

        $merge = $collection->merge(compact('menu', 'image', 'featured'));

        $bank->update($merge->all());

        return $bank;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteBank($id)
    {
        $bank = $this->findBankById($id);

        if ($bank->image != null) {
            $this->deleteOne($bank->image);
        }

        $bank->delete();

        return $bank;
    }
}