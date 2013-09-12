<?php

namespace spec\Humdir\Core\Usecase\Customer\Edit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmissionSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Customer $customer
     * @param Humdir\Core\Data\Project $project
     * @param Humdir\Core\Usecase\Customer\Edit\Repository $repository
     */
    function let($customer, $project, $repository)
    {
        $customer->id = 'id';
        $customer->name = 'name';
        $customer->company = 'company';
        $customer->referral = 'referral';
        $customer->last_contacted = 'last_contacted';
        $project->requirements = 'requirements';
        $project->proposal = 'proposal';
        $project->response = 'response';
        $project->notes = 'notes';
        $customer->project = $project;
        $this->beConstructedWith($customer, $repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Customer\Edit\Submission');
    }

    function it_should_be_a_customer()
    {
        $this->shouldHaveType('Humdir\Core\Data\Customer');
    }

    function it_can_update_the_submission($repository)
    {
        $repository->update_customer('id', 'name', 'company', 'referral', 'last_contacted', 'requirements', 'proposal', 'response', 'notes')->shouldBeCalled();
        $this->update();
    }
}
