<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- name [input]
 * -- educationDescription [textarea]
 * -- educationUri [input]
 * -- researchDescription [textarea]
 * -- url [input]
 * -- researchUri [input]
 * -- description [textarea]
 * - guid [input]
 * - departmentNumber [input]
 * - orgType [input]
 * - postalAdress [input]
 * - street [input]
 * - postOfficeBox [input]
 * - location [input]
 * - telephoneNumber [input]
 * - vxNumber [input]
 * - gpsC [input]
 * - domain [input]
 * - internalAdress [input]
 * - ParentDepartmentNumber [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByLocalizedfields($field, $value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByName($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByEducationDescription($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByEducationUri($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByResearchDescription($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByUrl($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByResearchUri($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByDescription($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByGuid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByDepartmentNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByOrgType($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByPostalAdress($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByStreet($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByPostOfficeBox($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByLocation($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByTelephoneNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByVxNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByGpsC($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByDomain($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByInternalAdress($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatOrganisation\Listing|\Pimcore\Model\DataObject\LucatOrganisation|null getByParentDepartmentNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class LucatOrganisation extends Concrete
{
protected $o_classId = "21";
protected $o_className = "LucatOrganisation";
protected $localizedfields;
protected $guid;
protected $departmentNumber;
protected $orgType;
protected $postalAdress;
protected $street;
protected $postOfficeBox;
protected $location;
protected $telephoneNumber;
protected $vxNumber;
protected $gpsC;
protected $domain;
protected $internalAdress;
protected $ParentDepartmentNumber;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get localizedfields - 
* @return \Pimcore\Model\DataObject\Localizedfield|null
*/
public function getLocalizedfields()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("localizedfields");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("localizedfields")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get name - Namn
* @return string|null
*/
public function getName($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("name", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("name");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get educationDescription - Utbildningsbeskrivning
* @return string|null
*/
public function getEducationDescription($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("educationDescription", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("educationDescription");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get educationUri - URL (utbildning)
* @return string|null
*/
public function getEducationUri($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("educationUri", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("educationUri");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get researchDescription - Forskningsbeskrivning
* @return string|null
*/
public function getResearchDescription($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("researchDescription", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("researchDescription");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get url - Hemsida
* @return string|null
*/
public function getUrl($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("url", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("url");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get researchUri - URL (forskning)
* @return string|null
*/
public function getResearchUri($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("researchUri", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("researchUri");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get description - Description
* @return string|null
*/
public function getDescription($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("description", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("description");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set localizedfields - 
* @param \Pimcore\Model\DataObject\Localizedfield|null $localizedfields
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setLocalizedfields($localizedfields)
{
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getLocalizedfields();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$this->markFieldDirty("localizedfields", true);
	$this->localizedfields = $localizedfields;

	return $this;
}

/**
* Set name - Namn
* @param string|null $name
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setName ($name, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("name", $name, $language, !$isEqual);

	return $this;
}

/**
* Set educationDescription - Utbildningsbeskrivning
* @param string|null $educationDescription
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setEducationDescription ($educationDescription, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("educationDescription", $educationDescription, $language, !$isEqual);

	return $this;
}

/**
* Set educationUri - URL (utbildning)
* @param string|null $educationUri
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setEducationUri ($educationUri, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("educationUri", $educationUri, $language, !$isEqual);

	return $this;
}

/**
* Set researchDescription - Forskningsbeskrivning
* @param string|null $researchDescription
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setResearchDescription ($researchDescription, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("researchDescription", $researchDescription, $language, !$isEqual);

	return $this;
}

/**
* Set url - Hemsida
* @param string|null $url
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setUrl ($url, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("url", $url, $language, !$isEqual);

	return $this;
}

/**
* Set researchUri - URL (forskning)
* @param string|null $researchUri
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setResearchUri ($researchUri, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("researchUri", $researchUri, $language, !$isEqual);

	return $this;
}

/**
* Set description - Description
* @param string|null $description
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setDescription ($description, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("description", $description, $language, !$isEqual);

	return $this;
}

/**
* Get guid - GUID
* @return string|null
*/
public function getGuid()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("guid");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->guid;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set guid - GUID
* @param string|null $guid
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setGuid($guid)
{
	$this->guid = $guid;

	return $this;
}

/**
* Get departmentNumber - departmentNumber
* @return string|null
*/
public function getDepartmentNumber()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("departmentNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->departmentNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set departmentNumber - departmentNumber
* @param string|null $departmentNumber
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setDepartmentNumber($departmentNumber)
{
	$this->departmentNumber = $departmentNumber;

	return $this;
}

/**
* Get orgType - Organisationstyp
* @return string|null
*/
public function getOrgType()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("orgType");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->orgType;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set orgType - Organisationstyp
* @param string|null $orgType
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setOrgType($orgType)
{
	$this->orgType = $orgType;

	return $this;
}

/**
* Get postalAdress - Postadress
* @return string|null
*/
public function getPostalAdress()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("postalAdress");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->postalAdress;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set postalAdress - Postadress
* @param string|null $postalAdress
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setPostalAdress($postalAdress)
{
	$this->postalAdress = $postalAdress;

	return $this;
}

/**
* Get street - Besöksadress
* @return string|null
*/
public function getStreet()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("street");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->street;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set street - Besöksadress
* @param string|null $street
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setStreet($street)
{
	$this->street = $street;

	return $this;
}

/**
* Get postOfficeBox - Hämtställe
* @return string|null
*/
public function getPostOfficeBox()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("postOfficeBox");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->postOfficeBox;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set postOfficeBox - Hämtställe
* @param string|null $postOfficeBox
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setPostOfficeBox($postOfficeBox)
{
	$this->postOfficeBox = $postOfficeBox;

	return $this;
}

/**
* Get location - Ort
* @return string|null
*/
public function getLocation()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("location");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->location;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set location - Ort
* @param string|null $location
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setLocation($location)
{
	$this->location = $location;

	return $this;
}

/**
* Get telephoneNumber - Telefonnummer
* @return string|null
*/
public function getTelephoneNumber()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("telephoneNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->telephoneNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set telephoneNumber - Telefonnummer
* @param string|null $telephoneNumber
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setTelephoneNumber($telephoneNumber)
{
	$this->telephoneNumber = $telephoneNumber;

	return $this;
}

/**
* Get vxNumber - Växel
* @return string|null
*/
public function getVxNumber()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("vxNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->vxNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set vxNumber - Växel
* @param string|null $vxNumber
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setVxNumber($vxNumber)
{
	$this->vxNumber = $vxNumber;

	return $this;
}

/**
* Get gpsC - GPS-koordinater
* @return string|null
*/
public function getGpsC()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("gpsC");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->gpsC;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set gpsC - GPS-koordinater
* @param string|null $gpsC
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setGpsC($gpsC)
{
	$this->gpsC = $gpsC;

	return $this;
}

/**
* Get domain - Domän
* @return string|null
*/
public function getDomain()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("domain");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->domain;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set domain - Domän
* @param string|null $domain
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setDomain($domain)
{
	$this->domain = $domain;

	return $this;
}

/**
* Get internalAdress - Besöksadress
* @return string|null
*/
public function getInternalAdress()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("internalAdress");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->internalAdress;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set internalAdress - Besöksadress
* @param string|null $internalAdress
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setInternalAdress($internalAdress)
{
	$this->internalAdress = $internalAdress;

	return $this;
}

/**
* Get ParentDepartmentNumber - ParentDepartmentNumber
* @return string|null
*/
public function getParentDepartmentNumber()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("ParentDepartmentNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->ParentDepartmentNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set ParentDepartmentNumber - ParentDepartmentNumber
* @param string|null $ParentDepartmentNumber
* @return \Pimcore\Model\DataObject\LucatOrganisation
*/
public function setParentDepartmentNumber($ParentDepartmentNumber)
{
	$this->ParentDepartmentNumber = $ParentDepartmentNumber;

	return $this;
}

}

