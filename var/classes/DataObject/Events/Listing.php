<?php

namespace Pimcore\Model\DataObject\Events;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\Events|false current()
 * @method DataObject\Events[] load()
 * @method DataObject\Events[] getData()
 * @method DataObject\Events[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "16";
protected $className = "Events";


/**
* Filter by Rubrik (Rubrik)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRubrik ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Rubrik")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Ingress (Ingress)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByIngress ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Ingress")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Body (Text som beskriver evenemanget)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByBody ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Body")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Image1 (Bild)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByImage1 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Image1")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Alt (Alt-text)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByAlt ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Alt")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Caption (Bildtext)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByCaption ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Caption")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Start (Händelsen börjar)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByStart ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Start")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by End (Händelsen slutar)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByEnd ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("End")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by ShowEnd (Visa ut sluttid)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByShowEnd ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("ShowEnd")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by venue_later (Lokal meddelas senare)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByVenue_later ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("venue_later")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by venue (Lokal)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByVenue ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("venue")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Organizer (Arrangör)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByOrganizer ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Organizer")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Namn (Kontaktperson)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByNamn ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Namn")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Titel (Titel)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByTitel ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Titel")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by email (E-post)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByEmail ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("email")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Phone (Telefon:)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByPhone ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Phone")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by FormLink (Länk till anmälan)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByFormLink ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("FormLink")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by RegDate (Sista anmälningsdag)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRegDate ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("RegDate")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Fullbokat (Evenemanget är fullbokat)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByFullbokat ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Fullbokat")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Alert (Meddelande)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByAlert ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Alert")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Cancelled (Evenemanget är inställt)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByCancelled ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Cancelled")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Category (Eventkategori)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByCategory ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Category")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Serie (Återkommande serie)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySerie ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Serie")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by SV (Visa ut på svenska sidor)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySV ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("SV")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by EN (Visa ut på engelska sidor)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByEN ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("EN")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Check (Check)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByCheck ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Check")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Startpage (Visa på startsida)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByStartpage ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Startpage")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Webb (Webb)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByWebb ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Webb")->addListingFilter($this, $data, $operator);
	return $this;
}



}
