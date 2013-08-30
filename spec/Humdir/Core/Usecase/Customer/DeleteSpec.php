<?php

namespace spec\Humdir\Core\Usecase\Customer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DeleteSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Customer $customer
     * @param Humdir\Core\Usecase\Customer\Delete\Repository $customer_delete
     */
    function let($customer, $customer_delete)
    {
        $data = array(
            'customer' => $customer
        );

        $repositories = array(
            'customer_delete' => $customer_delete
        );

        $this->beConstructedWith($data, $repositories);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Customer\Delete');
    }

    function it_fetches_the_interactor()
    {
        $this->fetch()->shouldHaveType('Humdir\Core\Usecase\Customer\Delete\Interactor');
    }
}
