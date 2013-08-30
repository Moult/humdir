<?php

namespace spec\Humdir\Core\Usecase\Customer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrepareSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Customer $customer
     * @param Humdir\Core\Usecase\Customer\Prepare\Repository $customer_prepare
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($customer, $customer_prepare, $validator)
    {
        $data = array(
            'customer' => $customer
        );

        $repositories = array(
            'customer_prepare' => $customer_prepare
        );

        $tools = array(
            'validator' => $validator
        );

        $this->beConstructedWith($data, $repositories, $tools);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Customer\Prepare');
    }

    function it_fetches_the_interactor()
    {
        $this->fetch()->shouldHaveType('Humdir\Core\Usecase\Customer\Prepare\Interactor');
    }
}
