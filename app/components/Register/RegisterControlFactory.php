<?php

namespace App\Components\Register;

use Nette;

/**
 *
 * @author Jago
 */

interface RegisterControlFactory {

    /**
    *
    * @return RegisterControl
    */
    function create();
}
