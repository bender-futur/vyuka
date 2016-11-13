<?php

namespace App\Queries;

use App\Entities\SentenceEvent;

class SentenceEventQuery extends BaseQuery
{

	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->entityName = SentenceEvent::getClassName();
		parent::__construct($em);
	}

}
