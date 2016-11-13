<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM,
	Kdyby\Doctrine\Entities\BaseEntity;

/** @ORM\Entity */
class Sentence extends BaseEntity
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 **/
	protected $id;

	/** @ORM\Column(type="string") */
	protected $text;

	public function setText($text){$this->text = $text;}

}
