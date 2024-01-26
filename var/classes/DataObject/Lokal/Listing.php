<?php

namespace Pimcore\Model\DataObject\Lokal;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\Lokal|false current()
 * @method DataObject\Lokal[] load()
 * @method DataObject\Lokal[] getData()
 * @method DataObject\Lokal[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "15";
protected $className = "Lokal";


/**
* Filter by name (Lokal/plats)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByName ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("name")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by address (Besöksadress)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByAddress ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("address")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by latitud (Latitud)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLatitud ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("latitud")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by longitud (Longitud)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return static
*/
public function filterByLongitud ($data, $operator = '=')
{
	$this->getClass()->getFieldDefinition("longitud")->addListingFilter($this, $data, $operator);
	return $this;
}



}
