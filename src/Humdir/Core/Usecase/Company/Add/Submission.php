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
    public $address;
    public $contact_method;
    private $repository;

    public function __construct(Data\Company $company, Repository $repository)
    {
        $this->name = $company->name;
        $this->department = $company->department;
        $this->website = $company->website;
        $this->phone_number = $company->phone_number;
        $this->email = $company->email;
        $this->address = $company->address;
        $this->contact_method = $company->contact_method;
        $this->repository = $repository;
    }

    public function submit()
    {
        return $this->repository->add_company(
            $this->name,
            $this->department,
            $this->website,
            $this->phone_number,
            $this->email,
            $this->address,
            $this->contact_method
        );
    }
}
