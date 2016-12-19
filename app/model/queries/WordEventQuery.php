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


	public function getWords($eventId, $sentences = FALSE)
	{
		$qb = $this->em->createQueryBuilder();
		$qb->select('we')
			->from('App\Entities\WordEvent', 'we')
			->join('we.event', 'ev')
			->join('we.word', 'wo')
			->andWhere('ev.id = :eventId')
			->andWhere('wo.isSentence = :sentences');

		$qb->setParameters([
			'eventId' => $eventId,
			'sentences' => $sentences,
		]);

		return $this->getArray($qb->getQuery()
			->getResult());
	}

}
