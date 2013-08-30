<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Humdir\Core\Usecase\Customer\Prepare;

interface Repository
{
    public function does_company_exist($id);
}
