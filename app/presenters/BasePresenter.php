<?php

namespace App\Presenters;

use App\Components\AddItem,
	Nette\Application\UI\Presenter;

class BasePresenter extends Presenter
{

	/** @var \App\Queries\WordEventQuery @inject */
	public $wordEventQuery;

	/** @var \App\Queries\EventQuery @inject */
	public $eventQuery;

	/** @var \App\Queries\WordQuery @inject */
	public $wordQuery;


	public function createComponentAddItem()
	{
		return new AddItem($this->eventQuery, $this->wordQuery, $this->wordEventQuery);
	}


	/**
	 * Return TRUE if $action is actual action
	 * @param string $action fully qualified action to compare
	 * @return bool
	 */
	public function isAction($action)
	{
		return strpos($this->getAction(TRUE), $action) !== FALSE;
	}

}
