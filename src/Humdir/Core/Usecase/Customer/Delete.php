<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer;
use Humdir\Core\Usecase\Customer\Delete\Interactor;

class Delete
{
    private $data;
    private $repositories;

    public function __construct(array $data, array $repositories)
    {
        $this->data = $data;
        $this->repositories = $repositories;
    }

    public function fetch()
    {
        return new Interactor(
            $this->data['customer'],
            $this->repositories['customer_delete']
        );
    }
}
