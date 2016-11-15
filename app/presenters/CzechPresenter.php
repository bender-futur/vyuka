<?php

namespace App\Presenters;

use App\Queries;

class CzechPresenter extends BasePresenter
{

	/** @var \App\Queries\WordEventQuery @inject */
	public $wordEventQuery;

	/** @var \App\Queries\SentenceEventQuery @inject */
	public $sentenceEventQuery;


	public function renderListedWords()
	{
		$this->template->words = $this->wordEventQuery->getWords(Queries\EventQuery::LISTED_WORDS);
		$this->template->sentences = $this->sentenceEventQuery->getSentences(Queries\EventQuery::LISTED_WORDS);
	}


	public function renderPrefixes()
	{
		$this->template->words = $this->wordEventQuery->getWords(Queries\EventQuery::PREFIXES);
		$this->template->sentences = $this->sentenceEventQuery->getSentences(Queries\EventQuery::PREFIXES);
	}
}
