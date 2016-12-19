<?php

namespace App\Presenters;

use App\Queries;

class CzechPresenter extends BasePresenter
{

	/** @var \App\Queries\WordEventQuery @inject */
	public $wordEventQuery;

	/** @var \App\Queries\EventQuery @inject */
	public $eventQuery;


	public function renderDefault()
	{

	}


	public function renderListedWords()
	{
		$this->template->words = $this->wordEventQuery->getWords(Queries\EventQuery::LISTED_WORDS);
		$this->template->sentences = $this->wordEventQuery->getWords(Queries\EventQuery::LISTED_WORDS, TRUE);
		$this->template->eventId = $this->eventQuery->findBy(['id' => Queries\EventQuery::LISTED_WORDS])->id;
	}


	public function renderListedWordsAdd()
	{

	}


	public function renderPrefixes()
	{
//		$this->template->words = $this->wordEventQuery->getWords(Queries\EventQuery::PREFIXES);
//		$this->template->sentences = $this->sentenceEventQuery->getSentences(Queries\EventQuery::PREFIXES);
	}
}
