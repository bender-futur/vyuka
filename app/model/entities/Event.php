<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM,
	Kdyby\Doctrine\Entities\BaseEntity;

/** @ORM\Entity */
class Event extends BaseEntity
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 **/
	protected $id;

	/** @ORM\Column(type="string") */
	protected $name;

	/**
	 * @ORM\ManyToOne(targetEntity="Category")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
	 **/
	protected $category;

	public function setName($name){$this->name = $name;}
	public function setCategory(Category $category){$this->category = $category;}

}
