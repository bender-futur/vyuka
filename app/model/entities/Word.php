<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM,
	Kdyby\Doctrine\Entities\BaseEntity;

/** @ORM\Entity */
class Word extends BaseEntity
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 **/
	protected $id;

	/** @ORM\Column(type="string") */
	protected $text;

	/** @ORM\Column(type="string", name="is_sentence") */
	protected $isSentence;

	public function setText($text){$this->text = $text;}
	public function setIsSentence($isSentence){$this->isSentence = $isSentence;}

}
