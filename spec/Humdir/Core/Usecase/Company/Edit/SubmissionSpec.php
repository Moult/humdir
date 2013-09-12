<?php

namespace spec\Humdir\Core\Usecase\Company\Edit;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmissionSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Company $company
     * @param Humdir\Core\Usecase\Company\Edit\Repository $repository
     */
    function let($company, $repository)
    {
        $company->id = 'id';
        $company->name = 'name';
        $company->department = 'department';
        $company->website = 'website';
        $company->phone_number = 'phone_number';
        $company->email = 'email';
        $company->address = 'address';
        $company->contact_method = 'contact_method';
        $this->beConstructedWith($company, $repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Edit\Submission');
    }

    function it_can_update_the_submission($repository)
    {
        $repository->update_company('id', 'name', 'department', 'website', 'phone_number', 'email', 'address', 'contact_method')->shouldBeCalled();
        $this->update();
    }
}
