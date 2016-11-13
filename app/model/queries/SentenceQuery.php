<?php

namespace App\Queries;

use App\Entities\Sentence;

class SentenceQuery extends BaseQuery
{

	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->entityName = Sentence::getClassName();
		parent::__construct($em);
	}

}
