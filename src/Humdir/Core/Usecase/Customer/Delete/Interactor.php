<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer\Delete;
use Humdir\Core\Data;

class Interactor
{
    private $customer;
    private $repository;

    public function __construct(Data\Customer $customer, Repository $repository)
    {
        $this->customer = $customer;
        $this->repository = $repository;
    }

    public function interact()
    {
        $this->repository->delete_customer($this->customer->id);
    }
}
