<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company\Add;
use Humdir\Core\Data;
use Humdir\Core\Tool;
use Humdir\Core\Exception;

class Submission extends Data\Company
{
    public $name;
    public $department;
    public $website;
    public $phone_number;
    public $email;
    public $contact_method;
    private $repository;
    private $validator;

    public function __construct(Data\Company $company, Repository $repository, Tool\Validator $validator)
    {
        $this->name = $company->name;
        $this->department = $company->department;
        $this->website = $company->website;
        $this->phone_number = $company->phone_number;
        $this->email = $company->email;
        $this->contact_method = $company->contact_method;
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function validate()
    {
        $this->validator->setup(array(
            'name' => $this->name,
            'website' => $this->website,
            'email' => $this->email
        ));
        $this->validator->rule('name', 'not_empty');
        $this->validator->rule('website', 'url');
        $this->validator->rule('email', 'email');
        $this->validator->rule('email', 'email_domain');

        if ( ! $this->validator->check())
            throw new Exception\Validation($this->validator->errors());
    }

    public function submit()
    {
        $this->repository->add_company(
            $this->name,
            $this->department,
            $this->website,
            $this->phone_number,
            $this->email,
            $this->contact_method
        );
    }
}
