<?php

/**
 * Inheritance: no
 * Variants: no
 * Employee synced from Lucat
 *
 * Fields Summary:
 * - uid [input]
 * - guid [input]
 * - displayName [input]
 * - givenName [input]
 * - surName [input]
 * - country [input]
 * - mobile [input]
 * - phoneNumber [input]
 * - mail [input]
 * - luMail [input]
 * - website [input]
 * - Facebook [input]
 * - Flickr [input]
 * - Linkedin [input]
 * - Skype [input]
 * - Twitter [input]
 * - Vimeo [input]
 * - AcademicDegree [input]
 * - Organisationer [manyToManyRelation]
 * - Roller [manyToManyRelation]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByUid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByGuid($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByDisplayName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByGivenName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getBySurName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByCountry($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByMobile($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByPhoneNumber($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByMail($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByLuMail($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByWebsite($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByFacebook($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByFlickr($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByLinkedin($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getBySkype($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByTwitter($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByVimeo($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByAcademicDegree($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByOrganisationer($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\LucatPerson\Listing|\Pimcore\Model\DataObject\LucatPerson|null getByRoller($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class LucatPerson extends Concrete
{
protected $o_classId = "23";
protected $o_className = "LucatPerson";
protected $uid;
protected $guid;
protected $displayName;
protected $givenName;
protected $surName;
protected $country;
protected $mobile;
protected $phoneNumber;
protected $mail;
protected $luMail;
protected $website;
protected $Facebook;
protected $Flickr;
protected $Linkedin;
protected $Skype;
protected $Twitter;
protected $Vimeo;
protected $AcademicDegree;
protected $Organisationer;
protected $Roller;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
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
* @return \Pimcore\Model\DataObject\LucatPerson
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
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setGuid($guid)
{
	$this->guid = $guid;

	return $this;
}

/**
* Get displayName - Namn
* @return string|null
*/
public function getDisplayName()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("displayName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->displayName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set displayName - Namn
* @param string|null $displayName
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setDisplayName($displayName)
{
	$this->displayName = $displayName;

	return $this;
}

/**
* Get givenName - Förnamn
* @return string|null
*/
public function getGivenName()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("givenName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->givenName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set givenName - Förnamn
* @param string|null $givenName
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setGivenName($givenName)
{
	$this->givenName = $givenName;

	return $this;
}

/**
* Get surName - Efternamn
* @return string|null
*/
public function getSurName()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("surName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->surName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set surName - Efternamn
* @param string|null $surName
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setSurName($surName)
{
	$this->surName = $surName;

	return $this;
}

/**
* Get country - Land
* @return string|null
*/
public function getCountry()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("country");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->country;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set country - Land
* @param string|null $country
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setCountry($country)
{
	$this->country = $country;

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
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setMobile($mobile)
{
	$this->mobile = $mobile;

	return $this;
}

/**
* Get phoneNumber - Telefonnummer
* @return string|null
*/
public function getPhoneNumber()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("phoneNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->phoneNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set phoneNumber - Telefonnummer
* @param string|null $phoneNumber
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setPhoneNumber($phoneNumber)
{
	$this->phoneNumber = $phoneNumber;

	return $this;
}

/**
* Get mail - E-post
* @return string|null
*/
public function getMail()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("mail");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->mail;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set mail - E-post
* @param string|null $mail
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setMail($mail)
{
	$this->mail = $mail;

	return $this;
}

/**
* Get luMail - E-post
* @return string|null
*/
public function getLuMail()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("luMail");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->luMail;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set luMail - E-post
* @param string|null $luMail
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setLuMail($luMail)
{
	$this->luMail = $luMail;

	return $this;
}

/**
* Get website - Hemsida
* @return string|null
*/
public function getWebsite()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("website");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->website;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set website - Hemsida
* @param string|null $website
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setWebsite($website)
{
	$this->website = $website;

	return $this;
}

/**
* Get Facebook - Facebook
* @return string|null
*/
public function getFacebook()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Facebook");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Facebook;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Facebook - Facebook
* @param string|null $Facebook
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setFacebook($Facebook)
{
	$this->Facebook = $Facebook;

	return $this;
}

/**
* Get Flickr - Flickr
* @return string|null
*/
public function getFlickr()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Flickr");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Flickr;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Flickr - Flickr
* @param string|null $Flickr
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setFlickr($Flickr)
{
	$this->Flickr = $Flickr;

	return $this;
}

/**
* Get Linkedin - Linkedin
* @return string|null
*/
public function getLinkedin()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Linkedin");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Linkedin;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Linkedin - Linkedin
* @param string|null $Linkedin
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setLinkedin($Linkedin)
{
	$this->Linkedin = $Linkedin;

	return $this;
}

/**
* Get Skype - Skype
* @return string|null
*/
public function getSkype()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Skype");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Skype;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Skype - Skype
* @param string|null $Skype
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setSkype($Skype)
{
	$this->Skype = $Skype;

	return $this;
}

/**
* Get Twitter - Twitter
* @return string|null
*/
public function getTwitter()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Twitter");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Twitter;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Twitter - Twitter
* @param string|null $Twitter
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setTwitter($Twitter)
{
	$this->Twitter = $Twitter;

	return $this;
}

/**
* Get Vimeo - Vimeo
* @return string|null
*/
public function getVimeo()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Vimeo");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Vimeo;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Vimeo - Vimeo
* @param string|null $Vimeo
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setVimeo($Vimeo)
{
	$this->Vimeo = $Vimeo;

	return $this;
}

/**
* Get AcademicDegree - Examen
* @return string|null
*/
public function getAcademicDegree()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("AcademicDegree");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->AcademicDegree;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set AcademicDegree - Examen
* @param string|null $AcademicDegree
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setAcademicDegree($AcademicDegree)
{
	$this->AcademicDegree = $AcademicDegree;

	return $this;
}

/**
* Get Organisationer - Organisationer
* @return \Pimcore\Model\DataObject\LucatOrganisation[]
*/
public function getOrganisationer()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Organisationer");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("Organisationer")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Organisationer - Organisationer
* @param \Pimcore\Model\DataObject\LucatOrganisation[] $Organisationer
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setOrganisationer($Organisationer)
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("Organisationer");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getOrganisationer();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $Organisationer);
	if (!$isEqual) {
		$this->markFieldDirty("Organisationer", true);
	}
	$this->Organisationer = $fd->preSetData($this, $Organisationer);
	return $this;
}

/**
* Get Roller - Roller
* @return \Pimcore\Model\DataObject\LucatRoll[]
*/
public function getRoller()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Roller");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("Roller")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Roller - Roller
* @param \Pimcore\Model\DataObject\LucatRoll[] $Roller
* @return \Pimcore\Model\DataObject\LucatPerson
*/
public function setRoller($Roller)
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("Roller");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getRoller();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $Roller);
	if (!$isEqual) {
		$this->markFieldDirty("Roller", true);
	}
	$this->Roller = $fd->preSetData($this, $Roller);
	return $this;
}

}

