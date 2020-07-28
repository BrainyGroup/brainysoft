<?php

namespace BrainySoft\Contracts;

/**
 * Interface BankContract
 * @package Bank\Contracts
 */

interface BankContract
{
    /**
     * @param string $order
     * @param string $sort
     * @param array  $columns
     * @return mixed
     */

    public function listBanks(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findBankById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createBank(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateBank(array $params);

    /**
     * @param $id
     * @return bool
     */
    public function deleteBank($id);

}