<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - uuid [input]
 * - sourceId [input]
 * - localizedfields [localizedfields]
 * -- name [input]
 * -- portalUrl [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\LucrisOrganisation\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\LucrisOrganisation\Listing|\Pimcore\Model\DataObject\LucrisOrganisation|null getByUuid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisOrganisation\Listing|\Pimcore\Model\DataObject\LucrisOrganisation|null getBySourceId($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisOrganisation\Listing|\Pimcore\Model\DataObject\LucrisOrganisation|null getByLocalizedfields($field, $value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisOrganisation\Listing|\Pimcore\Model\DataObject\LucrisOrganisation|null getByName($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisOrganisation\Listing|\Pimcore\Model\DataObject\LucrisOrganisation|null getByPortalUrl($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
*/

class LucrisOrganisation extends Concrete
{
protected $o_classId = "20";
protected $o_className = "LucrisOrganisation";
protected $uuid;
protected $sourceId;
protected $localizedfields;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\LucrisOrganisation
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get uuid - UUID
* @return string|null
*/
public function getUuid()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("uuid");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->uuid;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set uuid - UUID
* @param string|null $uuid
* @return \Pimcore\Model\DataObject\LucrisOrganisation
*/
public function setUuid($uuid)
{
	$this->uuid = $uuid;

	return $this;
}

/**
* Get sourceId - Source ID
* @return string|null
*/
public function getSourceId()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("sourceId");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->sourceId;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set sourceId - Source ID
* @param string|null $sourceId
* @return \Pimcore\Model\DataObject\LucrisOrganisation
*/
public function setSourceId($sourceId)
{
	$this->sourceId = $sourceId;

	return $this;
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
* Get portalUrl - Portal Url
* @return string|null
*/
public function getPortalUrl($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("portalUrl", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("portalUrl");
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
* @return \Pimcore\Model\DataObject\LucrisOrganisation
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
* @return \Pimcore\Model\DataObject\LucrisOrganisation
*/
public function setName ($name, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("name", $name, $language, !$isEqual);

	return $this;
}

/**
* Set portalUrl - Portal Url
* @param string|null $portalUrl
* @return \Pimcore\Model\DataObject\LucrisOrganisation
*/
public function setPortalUrl ($portalUrl, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("portalUrl", $portalUrl, $language, !$isEqual);

	return $this;
}

}

