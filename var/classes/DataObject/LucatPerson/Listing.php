<?php

namespace Pimcore\Model\DataObject\LucatPerson;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\LucatPerson|false current()
 * @method DataObject\LucatPerson[] load()
 * @method DataObject\LucatPerson[] getData()
 * @method DataObject\LucatPerson[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "23";
protected $className = "LucatPerson";


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
* Filter by displayName (Namn)
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
* Filter by givenName (Förnamn)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByGivenName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("givenName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by surName (Efternamn)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySurName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("surName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by country (Land)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByCountry ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("country")->addListingFilter($this, $data, $operator);
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
* Filter by phoneNumber (Telefonnummer)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPhoneNumber ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("phoneNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by mail (E-post)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByMail ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("mail")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by luMail (E-post)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLuMail ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("luMail")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by website (Hemsida)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByWebsite ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("website")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Facebook (Facebook)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByFacebook ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Facebook")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Flickr (Flickr)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByFlickr ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Flickr")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Linkedin (Linkedin)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLinkedin ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Linkedin")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Skype (Skype)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySkype ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Skype")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Twitter (Twitter)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByTwitter ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Twitter")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Vimeo (Vimeo)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByVimeo ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Vimeo")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by AcademicDegree (Examen)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByAcademicDegree ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("AcademicDegree")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Organisationer (Organisationer)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByOrganisationer ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Organisationer")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Roller (Roller)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRoller ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Roller")->addListingFilter($this, $data, $operator);
	return $this;
}



}
