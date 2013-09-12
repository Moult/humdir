<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Company\Add;

interface Repository
{
    public function add_company($name, $department, $website, $phone_number, $email, $address, $contact_method);
}
