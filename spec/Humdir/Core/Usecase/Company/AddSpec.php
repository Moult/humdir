<?php

namespace spec\Humdir\Core\Usecase\Company;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddSpec extends ObjectBehavior
{
    /**
     * @param Humdir\Core\Data\Company $company
     * @param Humdir\Core\Usecase\Company\Add\Repository $company_add
     * @param Humdir\Core\Tool\Validator $validator
     */
    function let($company, $company_add, $validator)
    {
        $data = array(
            'company' => $company
        );

        $repositories = array(
            'company_add' => $company_add
        );

        $tools = array(
            'validator' => $validator
        );

        $this->beConstructedWith($data, $repositories, $tools);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Humdir\Core\Usecase\Company\Add');
    }

    function it_fetches_the_interactor()
    {
        $this->fetch()->shouldHaveType('Humdir\Core\Usecase\Company\Add\Interactor');
    }
}
