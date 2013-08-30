<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer\Prepare;
use Humdir\Core\Data;
use Humdir\Core\Tool;
use Humdir\Core\Exception;

class Submission extends Data\Customer
{
    public $name;
    public $company;
    private $validator;

    public function __construct(Data\Customer $customer, Tool\Validator $validator)
    {
        $this->name = $customer->name;
        $this->company = $customer->company;
        $this->validator = $validator;
    }

    public function validate()
    {
        $this->validator->setup(array(
            'name' => $this->name,
            'company' => $this->company
        ));
        $this->validator->rule('name', 'not_empty');
        $this->validator->callback('company', array($this, 'is_an_existing_company_id'), array('company'));

        if ( ! $this->validator->check())
            throw new Exception\Validation($this->validator->errors());
    }
}
