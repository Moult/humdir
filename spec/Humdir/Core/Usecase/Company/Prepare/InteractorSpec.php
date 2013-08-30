<?php

namespace spec\Humdir\Core\Usecase\Company\Prepare;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Usecase\Company\Prepare\Submission $submission
     */
    function let($submission)
    {
        $this->beConstructedWith($submission);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Prepare\Interactor');
    }

    function it_runs_the_interaction_chain($submission)
    {
        $submission->validate()->shouldBeCalled();
        $this->interact();
    }

}
