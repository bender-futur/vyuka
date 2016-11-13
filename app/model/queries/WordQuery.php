<?php

namespace App\Queries;

use App\Entities\Word;

class WordQuery extends BaseQuery
{

	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->entityName = Word::getClassName();
		parent::__construct($em);
	}

}
