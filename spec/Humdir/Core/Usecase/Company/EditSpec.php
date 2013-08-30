<?php

namespace spec\Humdir\Core\Usecase\Company;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EditSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Company $company
     * @param Humdir\Core\Usecase\Company\Edit\Repository $company_edit
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($company, $company_edit, $validator)
    {
        $data = array(
            'company' => $company
        );

        $repositories = array(
            'company_edit' => $company_edit
        );

        $tools = array(
            'validator' => $validator
        );

        $this->beConstructedWith($data, $repositories, $tools);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Edit');
    }

    function it_fetches_the_interactor()
    {
        $this->fetch()->shouldHaveType('Humdir\Core\Usecase\Company\Edit\Interactor');
    }
}
