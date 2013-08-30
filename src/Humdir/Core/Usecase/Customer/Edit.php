<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer;
use Humdir\Core\Usecase\Customer\Edit\Interactor;
use Humdir\Core\Usecase\Customer\Edit\Submission;
use Humdir\Core\Usecase;

class Edit
{
    private $data;
    private $repositories;
    private $tools;

    public function __construct(array $data, array $repositories, array $tools)
    {
        $this->data = $data;
        $this->repositories = $repositories;
        $this->tools = $tools;
    }

    public function fetch()
    {
        return new Interactor(
            $this->get_submission(),
            $this->get_customer_prepare()
        );
    }

    private function get_submission()
    {
        return new Submission(
            $this->data['customer'],
            $this->repositories['customer_edit']
        );
    }

    private function get_customer_prepare()
    {
        return new Usecase\Customer\Prepare(
            ['customer' => $this->data['customer']],
            ['customer_prepare' => $this->repositories['customer_prepare']],
            ['validator' => $this->tools['validator']]
        );
    }
}
