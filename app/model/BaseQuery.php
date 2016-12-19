<?php

namespace App\Queries;

use Kdyby\Doctrine\Entities\BaseEntity,
	Nette,
	Nette\InvalidArgumentException,
	Nette\Caching;

class BaseQuery extends Nette\Object
{

	/** @var \Kdyby\Doctrine\EntityManager */
	protected $em;

	/** @var  \Kdyby\Doctrine\EntityRepository */
	protected $repository;

	/** @var \ReflectionClass */
	protected $reflection;

	/** @var array fields that will be skipped in update procedures invoked by user */
	protected $readOnlyFields;

	/** @var \Doctrine\Common\Annotations\AnnotationReader */
	protected $annotationReader;

	/** @var string Name of the related doctrine entity, for example Card::getClassName() */
	protected $entityName;


	public function __construct(\Kdyby\Doctrine\EntityManager $em)
	{
		$this->em = $em;
		$this->repository = $em->getRepository($this->entityName);
	}

	/**
	 * Creates a new item
	 * @param array $data
	 * @return BaseEntity
	 */
	public function create($data)
	{
		$entity = new $this->entityName();

		if ($data) {
			foreach ($data as $key => $value) {
				$propertyName = $setMethod = '';
				$this->getPropertyNameAndSetMethod($key, $propertyName, $setMethod);
				if (property_exists($entity, $propertyName) && method_exists($entity, $setMethod)) {
					$this->convertDataType($value, $entity, $propertyName);
					$entity->$setMethod($value);
				}
			}
		}

		$this->em->persist($entity);
		$this->afterCreate($entity);
		$this->afterChange($entity);

		return $entity;
	}


	/**
	 * Finds data by given field and value
	 * @param array $items search query items in form [$field => value, ...]
	 * @param array $orderBy
	 * @param int $limit
	 * @param int $offset
	 * @return array|BaseEntity|null
	 */
	public function findBy($items, $orderBy = [], $limit = NULL, $offset = NULL)
	{
		$result = $this->repository->findBy($items, $orderBy, $limit, $offset);

		// @todo refactor
		if (count($result) === 1) {
			$result = $result[0];
		}

		return $result;
	}


	/**
	 * Deletes item, needs flushing afterwards to make effect in db
	 * @param BaseEntity $item merged entity to the repository
	 * @return BaseEntity deleted item
	 */
	public function delete($item)
	{
		if (!$item || !($item instanceof BaseEntity)) {
			throw new InvalidArgumentException('Trying to delete non existent entity');
		}

		if (!$item instanceof BaseEntity) {
			throw new InvalidArgumentException('Trying to delete entity that is not of type BaseEntity');
		}

		$this->em->remove($item);
		$this->afterDelete($item);
		$this->afterChange($item);

		return $item;
	}


	/**
	 * Updates item
	 * @param int $itemId
	 * @param array $data
	 * @return BaseEntity
	 */
	public function update($itemId, $data)
	{
		$entity = $this->findBy(['id' => $itemId]);

		foreach ($data as $key => $value) {
			$propertyName = $setMethod = '';
			$this->getPropertyNameAndSetMethod($key, $propertyName, $setMethod);
			$this->convertDataType($value, $entity, $propertyName);

			if ((!is_array($this->getReadOnlyFields()) || !in_array($propertyName, $this->getReadOnlyFields())) &&
				property_exists($entity, $propertyName) &&
				$value != $entity->$propertyName &&
				method_exists($entity, $setMethod)) {
				$entity->$setMethod($value);
			}
		}

		$this->em->flush();
		$this->refresh($entity);

		$this->afterUpdate($entity);
		$this->afterChange($entity);

		return $entity;
	}


	public function flush()
	{
		$this->em->flush();
	}


	public function clear()
	{
		$this->em->clear();
	}


	public function refresh($entity)
	{
		$this->em->refresh($entity);
	}


	public function merge($entity)
	{
		return $this->em->merge($entity);
	}


	public function createQuery($queryString)
	{
		return $this->em->createQuery($queryString);
	}


	public function createQueryBuilder()
	{
		return $this->em->createQueryBuilder();
	}


	public function getConnection()
	{
		return $this->em->getConnection();
	}


	public function getEntityName()
	{
		return $this->entityName;
	}


	private function getPropertyNameAndSetMethod($key, &$name, &$setMethod)
	{
		$name = '';
		$setMethod = 'set';
		$parts = explode('_', $key);

		foreach ($parts as $part) {
			$setMethod .= ucfirst($part);
			$name .= ucfirst($part);
		}
		$name = lcfirst($name);
	}


	private function convertDataType(&$value, $entity, $propertyName)
	{
		if (gettype($entity->$propertyName) === 'boolean') {
			if ($value === 'false' || $value === '0') {
				$value = FALSE;
			} else if ($value === 'true' || $value === '1') {
				$value = TRUE;
			}
		}
	}


	protected function getReadOnlyFields()
	{
		return $this->readOnlyFields ?: [];
	}


	/**
	 * @param BaseEntity $entity
	 */
	protected function afterCreate($entity)
	{
	}


	/**
	 * @param BaseEntity $entity
	 */
	protected function afterUpdate($entity)
	{
	}


	/**
	 * @param BaseEntity $entity
	 */
	protected function afterDelete($entity)
	{
	}


	/**
	 * @param BaseEntity $entity
	 */
	protected function afterChange($entity)
	{
	}


	/**
	 * If $items is an entity, it returns an array containing this entity, if $items is an array, it is returned
	 * @param mixed $items
	 * @return array
	 */
	protected function getArray($items)
	{
		return is_array($items) ? $items : [$items];
	}

}
