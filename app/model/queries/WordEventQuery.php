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


	public function getWords($eventId)
	{
		$qb = $this->em->createQueryBuilder();
		$qb->select('we')
			->from('App\Entities\WordEvent', 'we')
			->join('we.event', 'ev')
			->where('ev.id = :eventId');

		return $qb->setParameter('eventId', $eventId)
			->getQuery()
			->getArrayResult();
	}

}
