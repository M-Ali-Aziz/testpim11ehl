<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- displayName [input]
 * - luEduOrgRoleGUID [input]
 * - luEduPersonGUID [input]
 * - uid [input]
 * - guid [input]
 * - mobile [input]
 * - telephoneNumber [input]
 * - primaryContactInfo [checkbox]
 * - departmentNumber [input]
 * - roleType [input]
 * - leaveOfAbsence [checkbox]
 * - hideFromWeb [checkbox]
 * - room [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByLocalizedfields($field, $value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByDisplayName($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByLuEduOrgRoleGUID($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByLuEduPersonGUID($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByUid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByGuid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByMobile($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByTelephoneNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByPrimaryContactInfo($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByDepartmentNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByRoleType($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByLeaveOfAbsence($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByHideFromWeb($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatRoll\Listing|\Pimcore\Model\DataObject\LucatRoll|null getByRoom($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class LucatRoll extends Concrete
{
protected $o_classId = "22";
protected $o_className = "LucatRoll";
protected $localizedfields;
protected $luEduOrgRoleGUID;
protected $luEduPersonGUID;
protected $uid;
protected $guid;
protected $mobile;
protected $telephoneNumber;
protected $primaryContactInfo;
protected $departmentNumber;
protected $roleType;
protected $leaveOfAbsence;
protected $hideFromWeb;
protected $room;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\LucatRoll
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
* Get displayName - Titel
* @return string|null
*/
public function getDisplayName($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("displayName", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("displayName");
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
* @return \Pimcore\Model\DataObject\LucatRoll
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
* Set displayName - Titel
* @param string|null $displayName
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setDisplayName ($displayName, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("displayName", $displayName, $language, !$isEqual);

	return $this;
}

/**
* Get luEduOrgRoleGUID - OrgRoleGUID
* @return string|null
*/
public function getLuEduOrgRoleGUID()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("luEduOrgRoleGUID");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->luEduOrgRoleGUID;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set luEduOrgRoleGUID - OrgRoleGUID
* @param string|null $luEduOrgRoleGUID
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setLuEduOrgRoleGUID($luEduOrgRoleGUID)
{
	$this->luEduOrgRoleGUID = $luEduOrgRoleGUID;

	return $this;
}

/**
* Get luEduPersonGUID - PersonGUID
* @return string|null
*/
public function getLuEduPersonGUID()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("luEduPersonGUID");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->luEduPersonGUID;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set luEduPersonGUID - PersonGUID
* @param string|null $luEduPersonGUID
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setLuEduPersonGUID($luEduPersonGUID)
{
	$this->luEduPersonGUID = $luEduPersonGUID;

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
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setUid($uid)
{
	$this->uid = $uid;

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
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setGuid($guid)
{
	$this->guid = $guid;

	return $this;
}

/**
* Get mobile - Mobil
* @return string|null
*/
public function getMobile()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("mobile");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->mobile;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set mobile - Mobil
* @param string|null $mobile
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setMobile($mobile)
{
	$this->mobile = $mobile;

	return $this;
}

/**
* Get telephoneNumber - Telefon
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
* Set telephoneNumber - Telefon
* @param string|null $telephoneNumber
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setTelephoneNumber($telephoneNumber)
{
	$this->telephoneNumber = $telephoneNumber;

	return $this;
}

/**
* Get primaryContactInfo - Primär roll
* @return bool|null
*/
public function getPrimaryContactInfo()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("primaryContactInfo");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->primaryContactInfo;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set primaryContactInfo - Primär roll
* @param bool|null $primaryContactInfo
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setPrimaryContactInfo($primaryContactInfo)
{
	$this->primaryContactInfo = $primaryContactInfo;

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
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setDepartmentNumber($departmentNumber)
{
	$this->departmentNumber = $departmentNumber;

	return $this;
}

/**
* Get roleType - Typ av roll
* @return string|null
*/
public function getRoleType()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("roleType");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->roleType;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set roleType - Typ av roll
* @param string|null $roleType
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setRoleType($roleType)
{
	$this->roleType = $roleType;

	return $this;
}

/**
* Get leaveOfAbsence - Tjänstledig
* @return bool|null
*/
public function getLeaveOfAbsence()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("leaveOfAbsence");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->leaveOfAbsence;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set leaveOfAbsence - Tjänstledig
* @param bool|null $leaveOfAbsence
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setLeaveOfAbsence($leaveOfAbsence)
{
	$this->leaveOfAbsence = $leaveOfAbsence;

	return $this;
}

/**
* Get hideFromWeb - Osynlig på webben
* @return bool|null
*/
public function getHideFromWeb()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("hideFromWeb");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->hideFromWeb;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set hideFromWeb - Osynlig på webben
* @param bool|null $hideFromWeb
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setHideFromWeb($hideFromWeb)
{
	$this->hideFromWeb = $hideFromWeb;

	return $this;
}

/**
* Get room - room
* @return string|null
*/
public function getRoom()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("room");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->room;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set room - room
* @param string|null $room
* @return \Pimcore\Model\DataObject\LucatRoll
*/
public function setRoom($room)
{
	$this->room = $room;

	return $this;
}

}

