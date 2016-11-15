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


	public function getSentences($eventId)
	{
		$qb = $this->em->createQueryBuilder();
		$qb->select('se')
			->from('App\Entities\SentenceEvent', 'se')
			->join('se.event', 'ev')
			->where('ev.id = :eventId');

		return $qb->setParameter('eventId', $eventId)
			->getQuery()
			->getArrayResult();
	}

}
