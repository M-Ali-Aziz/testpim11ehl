<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - name [input]
 * - address [textarea]
 * - latitud [input]
 * - longitud [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\Lokal\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\Lokal\Listing|\Pimcore\Model\DataObject\Lokal|null getByName($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Lokal\Listing|\Pimcore\Model\DataObject\Lokal|null getByAddress($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Lokal\Listing|\Pimcore\Model\DataObject\Lokal|null getByLatitud($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Lokal\Listing|\Pimcore\Model\DataObject\Lokal|null getByLongitud($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class Lokal extends Concrete
{
protected $o_classId = "15";
protected $o_className = "Lokal";
protected $name;
protected $address;
protected $latitud;
protected $longitud;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\Lokal
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get name - Lokal/plats
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
* Set name - Lokal/plats
* @param string|null $name
* @return \Pimcore\Model\DataObject\Lokal
*/
public function setName($name)
{
	$this->name = $name;

	return $this;
}

/**
* Get address - Besöksadress
* @return string|null
*/
public function getAddress()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("address");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->address;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set address - Besöksadress
* @param string|null $address
* @return \Pimcore\Model\DataObject\Lokal
*/
public function setAddress($address)
{
	$this->address = $address;

	return $this;
}

/**
* Get latitud - Latitud
* @return string|null
*/
public function getLatitud()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("latitud");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->latitud;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set latitud - Latitud
* @param string|null $latitud
* @return \Pimcore\Model\DataObject\Lokal
*/
public function setLatitud($latitud)
{
	$this->latitud = $latitud;

	return $this;
}

/**
* Get longitud - Longitud
* @return string|null
*/
public function getLongitud()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("longitud");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->longitud;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set longitud - Longitud
* @param string|null $longitud
* @return \Pimcore\Model\DataObject\Lokal
*/
public function setLongitud($longitud)
{
	$this->longitud = $longitud;

	return $this;
}

}

