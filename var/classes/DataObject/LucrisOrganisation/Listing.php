<?php

namespace Pimcore\Model\DataObject\LucrisOrganisation;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\LucrisOrganisation|false current()
 * @method DataObject\LucrisOrganisation[] load()
 * @method DataObject\LucrisOrganisation[] getData()
 * @method DataObject\LucrisOrganisation[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "20";
protected $className = "LucrisOrganisation";


/**
* Filter by uuid (UUID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByUuid ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("uuid")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by sourceId (Source ID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySourceId ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("sourceId")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by name (Namn)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("name")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by portalUrl (Portal Url)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPortalUrl ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("portalUrl")->addListingFilter($this, $data, $operator);
	return $this;
}



}
