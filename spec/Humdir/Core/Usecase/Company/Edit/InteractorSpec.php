<?php

namespace spec\Humdir\Core\Usecase\Company\Edit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Usecase\Company\Edit\Submission $submission
     * @param Humdir\Core\Usecase\Company\Prepare $company_prepare
     */
    function let($submission, $company_prepare)
    {
        $this->beConstructedWith($submission, $company_prepare);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Edit\Interactor');
    }

    /**
     * @param Humdir\Core\Usecase\Company\Prepare\Interactor $interactor
     */
    function it_runs_the_interaction_chain($interactor, $submission, $company_prepare)
    {
        $company_prepare->fetch()->shouldBeCalled()->willReturn($interactor);
        $interactor->interact()->shouldBeCalled();
        $submission->update()->shouldBeCalled();
        $this->interact();
    }
}
