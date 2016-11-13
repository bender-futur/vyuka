<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM,
	Kdyby\Doctrine\Entities\BaseEntity;

/** @ORM\Entity */
class SentenceEvent extends BaseEntity
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 **/
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Sentence")
	 * @ORM\JoinColumn(name="sentence_id", referencedColumnName="id")
	 **/
	protected $sentence;

	/**
	 * @ORM\ManyToOne(targetEntity="Event")
	 * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
	 **/
	protected $event;

	public function setText($text){$this->text = $text;}
	public function setWord($word){$this->word = $word;}
	public function setEvent($event){$this->event = $event;}

}
