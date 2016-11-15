<?php

namespace App\Queries;

use App\Entities\Event;

class EventQuery extends BaseQuery
{

	const
		LISTED_WORDS = 1,
		COMPLIANCE = 2,
		PREFIXES = 3,
		MULTIPLICATION_AND_DIVISION = 4,
		FRACTIONS = 4,
		CALCULATIONS_TO_MILLION = 5;


	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->entityName = Event::getClassName();
		parent::__construct($em);
	}

}
