<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - University [input]
 * - SoleMoveId [input]
 * - Country [select]
 * - Region [select]
 * - MobilityType [multiselect]
 * - Subject [multiselect]
 * - Programme [multiselect]
 * - Year [multiselect]
 * - Period [multiselect]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\University\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getByUniversity($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getBySoleMoveId($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getByCountry($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getByRegion($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getByMobilityType($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getBySubject($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getByProgramme($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getByYear($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\University\Listing|\Pimcore\Model\DataObject\University|null getByPeriod($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class University extends Concrete
{
protected $o_classId = "24";
protected $o_className = "University";
protected $University;
protected $SoleMoveId;
protected $Country;
protected $Region;
protected $MobilityType;
protected $Subject;
protected $Programme;
protected $Year;
protected $Period;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\University
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get University - University
* @return string|null
*/
public function getUniversity()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("University");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->University;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set University - University
* @param string|null $University
* @return \Pimcore\Model\DataObject\University
*/
public function setUniversity($University)
{
	$this->University = $University;

	return $this;
}

/**
* Get SoleMoveId - SoleMOVE ID
* @return string|null
*/
public function getSoleMoveId()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("SoleMoveId");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->SoleMoveId;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set SoleMoveId - SoleMOVE ID
* @param string|null $SoleMoveId
* @return \Pimcore\Model\DataObject\University
*/
public function setSoleMoveId($SoleMoveId)
{
	$this->SoleMoveId = $SoleMoveId;

	return $this;
}

/**
* Get Country - Country
* @return string|null
*/
public function getCountry()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Country");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Country;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Country - Country
* @param string|null $Country
* @return \Pimcore\Model\DataObject\University
*/
public function setCountry($Country)
{
	$this->Country = $Country;

	return $this;
}

/**
* Get Region - Region
* @return string|null
*/
public function getRegion()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Region");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Region;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Region - Region
* @param string|null $Region
* @return \Pimcore\Model\DataObject\University
*/
public function setRegion($Region)
{
	$this->Region = $Region;

	return $this;
}

/**
* Get MobilityType - Mobility Type
* @return string[]|null
*/
public function getMobilityType()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("MobilityType");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->MobilityType;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set MobilityType - Mobility Type
* @param string[]|null $MobilityType
* @return \Pimcore\Model\DataObject\University
*/
public function setMobilityType($MobilityType)
{
	$this->MobilityType = $MobilityType;

	return $this;
}

/**
* Get Subject - Subject
* @return string[]|null
*/
public function getSubject()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Subject");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Subject;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Subject - Subject
* @param string[]|null $Subject
* @return \Pimcore\Model\DataObject\University
*/
public function setSubject($Subject)
{
	$this->Subject = $Subject;

	return $this;
}

/**
* Get Programme - Programme
* @return string[]|null
*/
public function getProgramme()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Programme");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Programme;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Programme - Programme
* @param string[]|null $Programme
* @return \Pimcore\Model\DataObject\University
*/
public function setProgramme($Programme)
{
	$this->Programme = $Programme;

	return $this;
}

/**
* Get Year - Year
* @return string[]|null
*/
public function getYear()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Year");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Year;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Year - Year
* @param string[]|null $Year
* @return \Pimcore\Model\DataObject\University
*/
public function setYear($Year)
{
	$this->Year = $Year;

	return $this;
}

/**
* Get Period - Period
* @return string[]|null
*/
public function getPeriod()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Period");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Period;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Period - Period
* @param string[]|null $Period
* @return \Pimcore\Model\DataObject\University
*/
public function setPeriod($Period)
{
	$this->Period = $Period;

	return $this;
}

}

