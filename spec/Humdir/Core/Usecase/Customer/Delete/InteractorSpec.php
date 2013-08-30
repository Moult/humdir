<?php

namespace spec\Humdir\Core\Usecase\Customer\Delete;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Customer $customer
     * @param Humdir\Core\Usecase\Customer\Delete\Repository $repository
     */
    function let($customer, $repository)
    {
        $customer->id = 'id';
        $this->beConstructedWith($customer, $repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Customer\Delete\Interactor');
    }

    function it_runs_the_interaction_chain($repository)
    {
        $repository->delete_customer('id')->shouldBeCalled();
        $this->interact();
    }
}
