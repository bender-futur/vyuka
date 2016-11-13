<?php

namespace App\Queries;

use App\Entities\Category;

class CategoryQuery extends BaseQuery
{

	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->entityName = Category::getClassName();
		parent::__construct($em);
	}

}
