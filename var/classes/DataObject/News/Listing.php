<?php

namespace Pimcore\Model\DataObject\News;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\News|false current()
 * @method DataObject\News[] load()
 * @method DataObject\News[] getData()
 * @method DataObject\News[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "13";
protected $className = "News";


/**
* Filter by Rubrik ()
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
* Filter by Ingress ()
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
* Filter by Body (Text)
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
* Filter by Alt ()
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
* Filter by Caption ()
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
* Filter by YouTube (YouTube videoklipp-ID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByYouTube ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("YouTube")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Rubrik3 ()
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRubrik3 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Rubrik3")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Body3 (Text)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByBody3 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Body3")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Image3 (Bild)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByImage3 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Image3")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Alt3 ()
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByAlt3 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Alt3")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Rubrik2 ()
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByRubrik2 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Rubrik2")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Body2 (Text)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByBody2 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Body2")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Image2 (Bild)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByImage2 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Image2")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Alt2 ()
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByAlt2 ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Alt2")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Category (Kärnverksamhet)
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
* Filter by Subject (Ämnesområde)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySubject ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Subject")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by SubSubject (Ämnen, övriga)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySubSubject ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("SubSubject")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Staff (Staff pages)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByStaff ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Staff")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Webb ()
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByWebb ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Webb")->addListingFilter($this, $data, $operator);
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
* Filter by Ettan (Visa ut på ettan (huvudnyhet))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByEttan ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Ettan")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Startpage (Visa ut på startsida)
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
* Filter by EHL (Kommunikationsavdelningen)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByEHL ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("EHL")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Snippet (Snippet)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterBySnippet ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Snippet")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by Color (Color)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByColor ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("Color")->addListingFilter($this, $data, $operator);
	return $this;
}



}
