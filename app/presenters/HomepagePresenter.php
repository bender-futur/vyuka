<?php

namespace App\Presenters;

use Nette;

class HomepagePresenter extends Nette\Application\UI\Presenter
{

	/** @var \App\Queries\WordQuery @inject */
	public $wordQuery;

	public function renderDefault()
	{
		$this->template->words = $this->wordQuery->findBy([]);
	}

}
