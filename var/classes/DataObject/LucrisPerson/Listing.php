<?php

namespace Pimcore\Model\DataObject\LucrisPerson;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\LucrisPerson|false current()
 * @method DataObject\LucrisPerson[] load()
 * @method DataObject\LucrisPerson[] getData()
 * @method DataObject\LucrisPerson[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "19";
protected $className = "LucrisPerson";


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
* Filter by uid (UID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByUid ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("uid")->addListingFilter($this, $data, $operator);
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
* Filter by firstName (Förnamn)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByFirstName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("firstName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by lastName (Efternamn)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLastName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("lastName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by photo (Bild)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPhoto ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("photo")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by uka (UKÄ)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByUka ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("uka")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by keyword (Fritext)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByKeyword ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("keyword")->addListingFilter($this, $data, $operator);
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

/**
* Filter by visibility (Synlighet)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByVisibility ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("visibility")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by modified (Lucris Modified datum)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByModified ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("modified")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by organisation (Organisation)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByOrganisation ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("organisation")->addListingFilter($this, $data, $operator);
	return $this;
}



}
