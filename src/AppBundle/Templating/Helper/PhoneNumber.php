<?php

declare(strict_types=1);

/**
* Department phonenumber templating helper
*
* @author Jonas Ledendal, M. Ali
*/

namespace AppBundle\Templating\Helper;

use Symfony\Component\Templating\Helper\Helper;

class PhoneNumber extends Helper
{
    /**
    * @inheritDoc
    */
    public function getName()
    {
        return 'phoneNumber';
    }

    public function __invoke($telephoneNumber)
    {
        if( ! empty($telephoneNumber)) {
            $t = $telephoneNumber;
            $t = substr($t, 0, 3).' '.substr($t, 3, 2).' '.substr($t, 5, 3).' '. substr($t, 8, 2).' '.substr($t, 10);
            return $t;
        }
        else {
            return ($this->view->language == 'sv') ?
            '046 222 00 00 (växel)' :
            '+46 46 222 00 00 (operator)';
        }
    }
}
