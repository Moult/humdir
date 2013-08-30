<?php

namespace spec\Humdir\Core\Usecase\Company\Add;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Usecase\Company\Add\Submission $submission
     */
    function let($submission)
    {
        $this->beConstructedWith($submission);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Add\Interactor');
    }

    function it_runs_the_interaction_chain($submission)
    {
        $submission->validate()->shouldBeCalled();
        $submission->submit()->shouldBeCalled();
        $this->interact();
    }
}
