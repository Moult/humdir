<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer\Edit;
use Humdir\Core\Data;

class Submission extends Data\Customer
{
    public $id;
    public $name;
    public $company;
    public $project;
    public $referral;
    public $last_contacted;
    private $repository;

    public function __construct(Data\Customer $customer, Repository $repository)
    {
        $this->id = $customer->id;
        $this->name = $customer->name;
        $this->company = $customer->company;
        $this->project = $customer->project;
        $this->referral = $customer->referral;
        $this->last_contacted = $customer->last_contacted;
        $this->repository = $repository;
    }

    public function update()
    {
        $this->repository->update_customer(
            $this->id,
            $this->name,
            $this->company,
            $this->referral,
            $this->last_contacted,
            $this->project->requirements,
            $this->project->proposal,
            $this->project->response,
            $this->project->notes,
            $this->project->category
        );
    }
}
