<?php

namespace App\Presenters;


class AjaxPresenter extends BasePresenter
{

	// order: action, handle, render

	/**
	 * @var int
	 */
	private $giftCount = 10;


	public function handleIncreaseGiftCount()
	{
		$this->giftCount++;
	}


	public function renderDefault()
	{
		$this->template->giftCount = $this->giftCount;
	}

}
