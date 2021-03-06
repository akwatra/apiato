<?php

namespace App\Containers\Payment\Tasks;

use App\Containers\Payment\Data\Repositories\PaymentAccountRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class FindPaymentAccountByIdTask
 *
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class FindPaymentAccountByIdTask extends Task
{
    private $repository;

    public function __construct(PaymentAccountRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     *
     * @return mixed
     * @throws NotFoundException
     */
    public function run($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
