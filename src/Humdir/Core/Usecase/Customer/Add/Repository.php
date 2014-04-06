<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer\Add;

interface Repository
{
    public function save_customer($name, $company, $referral, $last_contacted, $project_requirements, $project_proposal, $project_response, $project_notes, $project_category);
}
