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
    private $repository;
    private $validator;

    public function __construct(Data\Customer $customer, Repository $repository, Tool\Validator $validator)
    {
        $this->name = $customer->name;
        $this->company = $customer->company;
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function validate()
    {
        $this->validator->setup(array(
            'name' => $this->name,
            'company' => $this->company
        ));
        $this->validator->add_required_rule('name');
        $this->validator->add_callback('company', array($this, 'is_an_existing_company_id'), array('company'));

        if ( ! $this->validator->is_valid())
            throw new Exception\Validation($this->validator->get_error_keys());
    }

    public function is_an_existing_company_id($id)
    {
        return $this->repository->does_company_exist($id);
    }
}
