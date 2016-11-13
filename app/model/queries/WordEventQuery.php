<?php

namespace App\Queries;

use App\Entities\WordEvent;

class WordEventQuery extends BaseQuery
{

	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->entityName = WordEvent::getClassName();
		parent::__construct($em);
	}

}
