<?php

namespace Pimcore\Model\DataObject\Website;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\Website|false current()
 * @method DataObject\Website[] load()
 * @method DataObject\Website[] getData()
 * @method DataObject\Website[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "7";
protected $className = "website";


/**
* Filter by MainLanguage (Main Language)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByMainLanguage ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("MainLanguage")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by DepartmentNumber (Lucat Department Number)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDepartmentNumber ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("DepartmentNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by DomainName (Domain Name)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDomainName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("DomainName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Subdomain (Subdomain)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySubdomain ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Subdomain")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by NewsFilter (News filter)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByNewsFilter ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("NewsFilter")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by LocaleExists (Locale Exists)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLocaleExists ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("LocaleExists")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by BaseUri (Base Uri)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByBaseUri ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("BaseUri")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by main_title (Main title (header) *)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByMain_title ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("main_title")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by main_sub_title (Main sub title (header) *)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByMain_sub_title ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("main_sub_title")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by contact_information_name (Contact info (name) *)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByContact_information_name ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("contact_information_name")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by contact_information_address (Contact info (address) *)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByContact_information_address ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("contact_information_address")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by contact_information_phone (Contact info (phone) *)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByContact_information_phone ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("contact_information_phone")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by contact_information_mail (Contact info (mail))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByContact_information_mail ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("contact_information_mail")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by MainMenu (Main Menu *)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByMainMenu ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("MainMenu")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by TargetGroups (Målgrupper i toolbar)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByTargetGroups ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("TargetGroups")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Subsites (Undersajter i toolbar)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySubsites ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Subsites")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Shortcuts (Genvägslänkar bredvid sökruta)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByShortcuts ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Shortcuts")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Departments (Departments)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByDepartments ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Departments")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by SiteInfo (About this site)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySiteInfo ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("SiteInfo")->addListingFilter($this, $data, $operator);
	return $this;
}



}
