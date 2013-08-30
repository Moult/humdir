<?php

namespace spec\Humdir\Core\Usecase\Company\Add;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubmissionSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Company $company
     * @param Humdir\Core\Usecase\Company\Add\Repository $repository
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($company, $repository, $validator)
    {
        $company->name = 'name';
        $company->department = 'department';
        $company->website = 'website';
        $company->phone_number = 'phone_number';
        $company->email = 'email';
        $company->contact_method = 'contact_method';
        $this->beConstructedWith($company, $repository, $validator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Add\Submission');
    }

    function it_is_a_company()
    {
        $this->shouldHaveType('Humdir\Core\Data\Company');
    }

    function it_validates_the_submission($validator)
    {
        $validator->setup(array(
            'name' => 'name',
            'website' => 'website',
            'email' => 'email',
        ))->shouldBeCalled();
        $validator->rule('name', 'not_empty')->shouldBeCalled();
        $validator->rule('website', 'url')->shouldBeCalled();
        $validator->rule('email', 'email')->shouldBeCalled();
        $validator->rule('email', 'email_domain')->shouldBeCalled();
        $validator->check()->shouldBeCalled()->willReturn(FALSE);
        $validator->errors()->shouldBeCalled()->willReturn(array());
        $this->shouldThrow('Humdir\Core\Exception\Validation')->duringValidate();
    }

    function it_submits_the_submission($repository)
    {
        $repository->add_company('name', 'department', 'website', 'phone_number', 'email', 'contact_method')->shouldBeCalled();
        $this->submit();
    }
}
