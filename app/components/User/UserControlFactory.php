<?php

namespace App\Components\User;


interface UserControlFactory
{

	/**
	 * @return UserControl
	 */
	function create();

}
