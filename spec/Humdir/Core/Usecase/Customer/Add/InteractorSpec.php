<?php

namespace spec\Humdir\Core\Usecase\Customer\Add;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Usecase\Customer\Add\Submission $submission
     * @param Humdir\Core\Usecase\Customer\Prepare $customer_prepare
     */
    function let($submission, $customer_prepare)
    {
        $this->beConstructedWith($submission, $customer_prepare);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Customer\Add\Interactor');
    }

    /**
     * @param Humdir\Core\Usecase\Customer\Prepare\Interactor $interactor
     */
    function it_runs_the_interaction_chain($interactor, $submission, $customer_prepare)
    {
        $customer_prepare->fetch()->shouldBeCalled()->willReturn($interactor);
        $interactor->interact()->shouldBeCalled();
        $submission->save()->shouldBeCalled();
        $this->interact();
    }
}
