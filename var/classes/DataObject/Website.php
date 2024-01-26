<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - MainLanguage [language]
 * - DepartmentNumber [input]
 * - DomainName [input]
 * - Subdomain [input]
 * - NewsFilter [input]
 * - localizedfields [localizedfields]
 * -- LocaleExists [checkbox]
 * -- BaseUri [input]
 * -- main_title [input]
 * -- main_sub_title [input]
 * -- contact_information_name [textarea]
 * -- contact_information_address [input]
 * -- contact_information_phone [input]
 * -- contact_information_mail [input]
 * -- MainMenu [manyToManyRelation]
 * -- TargetGroups [manyToManyRelation]
 * -- Subsites [manyToManyRelation]
 * -- Shortcuts [manyToManyRelation]
 * -- Departments [manyToManyRelation]
 * -- SiteInfo [advancedManyToManyRelation]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\Website\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByMainLanguage($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByDepartmentNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByDomainName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getBySubdomain($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByNewsFilter($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByLocalizedfields($field, $value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByLocaleExists($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByBaseUri($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByMain_title($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByMain_sub_title($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByContact_information_name($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByContact_information_address($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByContact_information_phone($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByContact_information_mail($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByMainMenu($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByTargetGroups($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getBySubsites($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByShortcuts($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getByDepartments($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Website\Listing|\Pimcore\Model\DataObject\Website|null getBySiteInfo($value, $locale = null, $limit = 0, $offset = 0, $objectTypes = null)
*/

class Website extends Concrete
{
protected $o_classId = "7";
protected $o_className = "website";
protected $MainLanguage;
protected $DepartmentNumber;
protected $DomainName;
protected $Subdomain;
protected $NewsFilter;
protected $localizedfields;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\Website
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get MainLanguage - Main Language
* @return string|null
*/
public function getMainLanguage()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("MainLanguage");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->MainLanguage;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set MainLanguage - Main Language
* @param string|null $MainLanguage
* @return \Pimcore\Model\DataObject\Website
*/
public function setMainLanguage($MainLanguage)
{
	$this->MainLanguage = $MainLanguage;

	return $this;
}

/**
* Get DepartmentNumber - Lucat Department Number
* @return string|null
*/
public function getDepartmentNumber()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("DepartmentNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->DepartmentNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set DepartmentNumber - Lucat Department Number
* @param string|null $DepartmentNumber
* @return \Pimcore\Model\DataObject\Website
*/
public function setDepartmentNumber($DepartmentNumber)
{
	$this->DepartmentNumber = $DepartmentNumber;

	return $this;
}

/**
* Get DomainName - Domain Name
* @return string|null
*/
public function getDomainName()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("DomainName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->DomainName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set DomainName - Domain Name
* @param string|null $DomainName
* @return \Pimcore\Model\DataObject\Website
*/
public function setDomainName($DomainName)
{
	$this->DomainName = $DomainName;

	return $this;
}

/**
* Get Subdomain - Subdomain
* @return string|null
*/
public function getSubdomain()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Subdomain");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Subdomain;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Subdomain - Subdomain
* @param string|null $Subdomain
* @return \Pimcore\Model\DataObject\Website
*/
public function setSubdomain($Subdomain)
{
	$this->Subdomain = $Subdomain;

	return $this;
}

/**
* Get NewsFilter - News filter
* @return string|null
*/
public function getNewsFilter()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("NewsFilter");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->NewsFilter;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set NewsFilter - News filter
* @param string|null $NewsFilter
* @return \Pimcore\Model\DataObject\Website
*/
public function setNewsFilter($NewsFilter)
{
	$this->NewsFilter = $NewsFilter;

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
* Get LocaleExists - Locale Exists
* @return bool|null
*/
public function getLocaleExists($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("LocaleExists", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("LocaleExists");
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
* Get BaseUri - Base Uri
* @return string|null
*/
public function getBaseUri($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("BaseUri", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("BaseUri");
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
* Get main_title - Main title (header) *
* @return string|null
*/
public function getMain_title($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("main_title", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("main_title");
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
* Get main_sub_title - Main sub title (header) *
* @return string|null
*/
public function getMain_sub_title($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("main_sub_title", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("main_sub_title");
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
* Get contact_information_name - Contact info (name) *
* @return string|null
*/
public function getContact_information_name($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("contact_information_name", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("contact_information_name");
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
* Get contact_information_address - Contact info (address) *
* @return string|null
*/
public function getContact_information_address($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("contact_information_address", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("contact_information_address");
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
* Get contact_information_phone - Contact info (phone) *
* @return string|null
*/
public function getContact_information_phone($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("contact_information_phone", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("contact_information_phone");
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
* Get contact_information_mail - Contact info (mail)
* @return string|null
*/
public function getContact_information_mail($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("contact_information_mail", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("contact_information_mail");
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
* Get MainMenu - Main Menu *
* @return \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[]
*/
public function getMainMenu($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("MainMenu", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("MainMenu");
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
* Get TargetGroups - Målgrupper i toolbar
* @return \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[]
*/
public function getTargetGroups($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("TargetGroups", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("TargetGroups");
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
* Get Subsites - Undersajter i toolbar
* @return \Pimcore\Model\Document\Page[]
*/
public function getSubsites($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("Subsites", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Subsites");
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
* Get Shortcuts - Genvägslänkar bredvid sökruta
* @return \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[]
*/
public function getShortcuts($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("Shortcuts", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Shortcuts");
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
* Get Departments - Departments
* @return \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[]
*/
public function getDepartments($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("Departments", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Departments");
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
* Get SiteInfo - About this site
* @return \Pimcore\Model\DataObject\Data\ElementMetadata[]
*/
public function getSiteInfo($language = null)
{
	$data = $this->getLocalizedfields()->getLocalizedValue("SiteInfo", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("SiteInfo");
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
* @return \Pimcore\Model\DataObject\Website
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
* Set LocaleExists - Locale Exists
* @param bool|null $LocaleExists
* @return \Pimcore\Model\DataObject\Website
*/
public function setLocaleExists ($LocaleExists, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("LocaleExists", $LocaleExists, $language, !$isEqual);

	return $this;
}

/**
* Set BaseUri - Base Uri
* @param string|null $BaseUri
* @return \Pimcore\Model\DataObject\Website
*/
public function setBaseUri ($BaseUri, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("BaseUri", $BaseUri, $language, !$isEqual);

	return $this;
}

/**
* Set main_title - Main title (header) *
* @param string|null $main_title
* @return \Pimcore\Model\DataObject\Website
*/
public function setMain_title ($main_title, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("main_title", $main_title, $language, !$isEqual);

	return $this;
}

/**
* Set main_sub_title - Main sub title (header) *
* @param string|null $main_sub_title
* @return \Pimcore\Model\DataObject\Website
*/
public function setMain_sub_title ($main_sub_title, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("main_sub_title", $main_sub_title, $language, !$isEqual);

	return $this;
}

/**
* Set contact_information_name - Contact info (name) *
* @param string|null $contact_information_name
* @return \Pimcore\Model\DataObject\Website
*/
public function setContact_information_name ($contact_information_name, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("contact_information_name", $contact_information_name, $language, !$isEqual);

	return $this;
}

/**
* Set contact_information_address - Contact info (address) *
* @param string|null $contact_information_address
* @return \Pimcore\Model\DataObject\Website
*/
public function setContact_information_address ($contact_information_address, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("contact_information_address", $contact_information_address, $language, !$isEqual);

	return $this;
}

/**
* Set contact_information_phone - Contact info (phone) *
* @param string|null $contact_information_phone
* @return \Pimcore\Model\DataObject\Website
*/
public function setContact_information_phone ($contact_information_phone, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("contact_information_phone", $contact_information_phone, $language, !$isEqual);

	return $this;
}

/**
* Set contact_information_mail - Contact info (mail)
* @param string|null $contact_information_mail
* @return \Pimcore\Model\DataObject\Website
*/
public function setContact_information_mail ($contact_information_mail, $language = null)
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("contact_information_mail", $contact_information_mail, $language, !$isEqual);

	return $this;
}

/**
* Set MainMenu - Main Menu *
* @param \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[] $MainMenu
* @return \Pimcore\Model\DataObject\Website
*/
public function setMainMenu ($MainMenu, $language = null)
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("MainMenu");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getMainMenu($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $MainMenu);
	if (!$isEqual) {
		$this->markFieldDirty("MainMenu", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("MainMenu", $MainMenu, $language, !$isEqual);

	return $this;
}

/**
* Set TargetGroups - Målgrupper i toolbar
* @param \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[] $TargetGroups
* @return \Pimcore\Model\DataObject\Website
*/
public function setTargetGroups ($TargetGroups, $language = null)
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("TargetGroups");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getTargetGroups($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $TargetGroups);
	if (!$isEqual) {
		$this->markFieldDirty("TargetGroups", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("TargetGroups", $TargetGroups, $language, !$isEqual);

	return $this;
}

/**
* Set Subsites - Undersajter i toolbar
* @param \Pimcore\Model\Document\Page[] $Subsites
* @return \Pimcore\Model\DataObject\Website
*/
public function setSubsites ($Subsites, $language = null)
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("Subsites");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getSubsites($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $Subsites);
	if (!$isEqual) {
		$this->markFieldDirty("Subsites", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("Subsites", $Subsites, $language, !$isEqual);

	return $this;
}

/**
* Set Shortcuts - Genvägslänkar bredvid sökruta
* @param \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[] $Shortcuts
* @return \Pimcore\Model\DataObject\Website
*/
public function setShortcuts ($Shortcuts, $language = null)
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("Shortcuts");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getShortcuts($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $Shortcuts);
	if (!$isEqual) {
		$this->markFieldDirty("Shortcuts", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("Shortcuts", $Shortcuts, $language, !$isEqual);

	return $this;
}

/**
* Set Departments - Departments
* @param \Pimcore\Model\Document\Page[] | \Pimcore\Model\Document\Link[] $Departments
* @return \Pimcore\Model\DataObject\Website
*/
public function setDepartments ($Departments, $language = null)
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("Departments");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getDepartments($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $Departments);
	if (!$isEqual) {
		$this->markFieldDirty("Departments", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("Departments", $Departments, $language, !$isEqual);

	return $this;
}

/**
* Set SiteInfo - About this site
* @param \Pimcore\Model\DataObject\Data\ElementMetadata[] $SiteInfo
* @return \Pimcore\Model\DataObject\Website
*/
public function setSiteInfo ($SiteInfo, $language = null)
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("SiteInfo");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getSiteInfo($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $SiteInfo);
	if (!$isEqual) {
		$this->markFieldDirty("SiteInfo", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("SiteInfo", $SiteInfo, $language, !$isEqual);

	return $this;
}

}

