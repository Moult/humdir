<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company\Edit;
use Humdir\Core\Data;

class Submission
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
        $this->id = $company->id;
        $this->name = $company->name;
        $this->department = $company->department;
        $this->website = $company->website;
        $this->phone_number = $company->phone_number;
        $this->email = $company->email;
        $this->address = $company->address;
        $this->contact_method = $company->contact_method;
        $this->repository = $repository;
    }

    public function update()
    {
        $this->repository->update_company(
            $this->id,
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
