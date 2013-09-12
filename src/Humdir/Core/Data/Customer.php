<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Data;

class Customer
{
    public $id;
    public $name;
    /**
     * @var Data\Company
     */
    public $company;
    /**
     * @var Data\Project
     */
    public $project;
    public $referral;
    public $last_contacted;
}
