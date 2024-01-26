<?php

namespace Pimcore\Model\DataObject\LucatRoll;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\LucatRoll|false current()
 * @method DataObject\LucatRoll[] load()
 * @method DataObject\LucatRoll[] getData()
 * @method DataObject\LucatRoll[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "22";
protected $className = "LucatRoll";


/**
* Filter by displayName (Titel)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDisplayName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("displayName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by luEduOrgRoleGUID (OrgRoleGUID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLuEduOrgRoleGUID ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("luEduOrgRoleGUID")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by luEduPersonGUID (PersonGUID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLuEduPersonGUID ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("luEduPersonGUID")->addListingFilter($this, $data, $operator);
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
* Filter by guid (GUID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByGuid ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("guid")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by mobile (Mobil)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByMobile ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("mobile")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by telephoneNumber (Telefon)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByTelephoneNumber ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("telephoneNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by primaryContactInfo (Primär roll)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPrimaryContactInfo ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("primaryContactInfo")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by departmentNumber (departmentNumber)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDepartmentNumber ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("departmentNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by roleType (Typ av roll)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRoleType ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("roleType")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by leaveOfAbsence (Tjänstledig)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLeaveOfAbsence ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("leaveOfAbsence")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by hideFromWeb (Osynlig på webben)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByHideFromWeb ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("hideFromWeb")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by room (room)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRoom ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("room")->addListingFilter($this, $data, $operator);
	return $this;
}



}
