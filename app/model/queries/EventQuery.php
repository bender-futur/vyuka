<?php

namespace App\Queries;

use App\Entities\Event;

class EventQuery extends BaseQuery
{

	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->entityName = Event::getClassName();
		parent::__construct($em);
	}

}
