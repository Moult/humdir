<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */
namespace Humdir\Core\Usecase\Customer\Edit;

interface Repository
{
    public function update_customer($id, $name, $company, $referral, $last_contacted);
}
