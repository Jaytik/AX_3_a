<?php

namespace App\Components\SignIn;

interface SignInControlFactory
{
	/**
	 * @return SignInControl
	 */
	function create();
}