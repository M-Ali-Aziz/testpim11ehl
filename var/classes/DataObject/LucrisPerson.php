<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - uuid [input]
 * - uid [input]
 * - name [input]
 * - firstName [input]
 * - lastName [input]
 * - photo [image]
 * - localizedfields [localizedfields]
 * -- uka [input]
 * -- keyword [input]
 * -- portalUrl [input]
 * - visibility [input]
 * - modified [input]
 * - organisation [manyToManyObjectRelation]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByUuid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByUid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByFirstName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByLastName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByPhoto($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByLocalizedfields($field, $value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByUka($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByKeyword($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByPortalUrl($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByVisibility($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByModified($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucrisPerson\Listing|\Pimcore\Model\DataObject\LucrisPerson|null getByOrganisation($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class LucrisPerson extends Concrete
{
protected $o_classId = "19";
protected $o_className = "LucrisPerson";
protected $uuid;
protected $uid;
protected $name;
protected $firstName;
protected $lastName;
protected $photo;
protected $localizedfields;
protected $visibility;
protected $modified;
protected $organisation;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\LucrisPerson
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
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setUuid($uuid)
{
	$this->uuid = $uuid;

	return $this;
}

/**
* Get uid - UID
* @return string|null
*/
public function getUid()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("uid");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->uid;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set uid - UID
* @param string|null $uid
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setUid($uid)
{
	$this->uid = $uid;

	return $this;
}

/**
* Get name - Namn
* @return string|null
*/
public function getName()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("name");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->name;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set name - Namn
* @param string|null $name
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setName($name)
{
	$this->name = $name;

	return $this;
}

/**
* Get firstName - Förnamn
* @return string|null
*/
public function getFirstName()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("firstName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->firstName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set firstName - Förnamn
* @param string|null $firstName
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setFirstName($firstName)
{
	$this->firstName = $firstName;

	return $this;
}

/**
* Get lastName - Efternamn
* @return string|null
*/
public function getLastName()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("lastName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->lastName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set lastName - Efternamn
* @param string|null $lastName
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setLastName($lastName)
{
	$this->lastName = $lastName;

	return $this;
}

/**
* Get photo - Bild
* @return \Pimcore\Model\Asset\Image|null
*/
public function getPhoto()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("photo");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->photo;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set photo - Bild
* @param \Pimcore\Model\Asset\Image|null $photo
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setPhoto($photo)
{
	$this->photo = $photo;

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
* Get uka - UKÄ
* @return string|null
*/
public function getUka($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("uka", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("uka");
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
* Get keyword - Fritext
* @return string|null
*/
public function getKeyword($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("keyword", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("keyword");
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
* @return \Pimcore\Model\DataObject\LucrisPerson
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
* Set uka - UKÄ
* @param string|null $uka
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setUka ($uka, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("uka", $uka, $language, !$isEqual);

	return $this;
}

/**
* Set keyword - Fritext
* @param string|null $keyword
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setKeyword ($keyword, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("keyword", $keyword, $language, !$isEqual);

	return $this;
}

/**
* Set portalUrl - Portal Url
* @param string|null $portalUrl
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setPortalUrl ($portalUrl, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("portalUrl", $portalUrl, $language, !$isEqual);

	return $this;
}

/**
* Get visibility - Synlighet
* @return string|null
*/
public function getVisibility()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("visibility");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->visibility;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set visibility - Synlighet
* @param string|null $visibility
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setVisibility($visibility)
{
	$this->visibility = $visibility;

	return $this;
}

/**
* Get modified - Lucris Modified datum
* @return string|null
*/
public function getModified()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("modified");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->modified;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set modified - Lucris Modified datum
* @param string|null $modified
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setModified($modified)
{
	$this->modified = $modified;

	return $this;
}

/**
* Get organisation - Organisation
* @return \Pimcore\Model\DataObject\LucrisOrganisation[]
*/
public function getOrganisation()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("organisation");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("organisation")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set organisation - Organisation
* @param \Pimcore\Model\DataObject\LucrisOrganisation[] $organisation
* @return \Pimcore\Model\DataObject\LucrisPerson
*/
public function setOrganisation($organisation)
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("organisation");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getOrganisation();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $organisation);
	if (!$isEqual) {
		$this->markFieldDirty("organisation", true);
	}
	$this->organisation = $fd->preSetData($this, $organisation);
	return $this;
}

}

