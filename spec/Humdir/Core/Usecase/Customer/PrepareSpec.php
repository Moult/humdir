<?php

namespace spec\Humdir\Core\Usecase\Customer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrepareSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Customer $customer
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($customer, $validator)
    {
        $data = array(
            'customer' => $customer
        );

        $tools = array(
            'validator' => $validator
        );

        $this->beConstructedWith($data, $tools);
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
