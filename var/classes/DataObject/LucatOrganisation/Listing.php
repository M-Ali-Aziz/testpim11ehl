<?php

namespace Pimcore\Model\DataObject\LucatOrganisation;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\LucatOrganisation|false current()
 * @method DataObject\LucatOrganisation[] load()
 * @method DataObject\LucatOrganisation[] getData()
 * @method DataObject\LucatOrganisation[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "21";
protected $className = "LucatOrganisation";


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
* Filter by educationDescription (Utbildningsbeskrivning)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByEducationDescription ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("educationDescription")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by educationUri (URL (utbildning))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByEducationUri ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("educationUri")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by researchDescription (Forskningsbeskrivning)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByResearchDescription ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("researchDescription")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by url (Hemsida)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByUrl ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("url")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by researchUri (URL (forskning))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByResearchUri ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("researchUri")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by description (Description)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDescription ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("description")->addListingFilter($this, $data, $operator);
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
* Filter by orgType (Organisationstyp)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByOrgType ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("orgType")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by postalAdress (Postadress)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPostalAdress ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("postalAdress")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by street (Besöksadress)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByStreet ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("street")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by postOfficeBox (Hämtställe)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPostOfficeBox ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("postOfficeBox")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by location (Ort)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLocation ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("location")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by telephoneNumber (Telefonnummer)
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
* Filter by vxNumber (Växel)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByVxNumber ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("vxNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by gpsC (GPS-koordinater)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByGpsC ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("gpsC")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by domain (Domän)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDomain ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("domain")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by internalAdress (Besöksadress)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByInternalAdress ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("internalAdress")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by ParentDepartmentNumber (ParentDepartmentNumber)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByParentDepartmentNumber ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("ParentDepartmentNumber")->addListingFilter($this, $data, $operator);
	return $this;
}



}
