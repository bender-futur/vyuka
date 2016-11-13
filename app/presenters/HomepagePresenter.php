<?php

namespace App\Presenters;

use Nette\Application\UI\Presenter;

class HomepagePresenter extends Presenter
{

	/** @var \App\Queries\WordQuery @inject */
	public $wordQuery;

	public function renderDefault()
	{
		$this->template->words = $this->wordQuery->findBy([]);
	}

}
