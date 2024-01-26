<?php

namespace Pimcore\Model\DataObject\University;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\University|false current()
 * @method DataObject\University[] load()
 * @method DataObject\University[] getData()
 * @method DataObject\University[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "24";
protected $className = "University";


/**
* Filter by University (University)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByUniversity ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("University")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by SoleMoveId (SoleMOVE ID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySoleMoveId ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("SoleMoveId")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Country (Country)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByCountry ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Country")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Region (Region)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRegion ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Region")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by MobilityType (Mobility Type)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByMobilityType ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("MobilityType")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Subject (Subject)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySubject ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Subject")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Programme (Programme)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByProgramme ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Programme")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Year (Year)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByYear ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Year")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Period (Period)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPeriod ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Period")->addListingFilter($this, $data, $operator);
	return $this;
}



}
