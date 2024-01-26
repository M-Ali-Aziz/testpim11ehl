<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - Rubrik [input]
 * - Ingress [textarea]
 * - Body [wysiwyg]
 * - Image1 [image]
 * - Alt [input]
 * - Caption [input]
 * - Video [video]
 * - Start [datetime]
 * - End [datetime]
 * - ShowEnd [checkbox]
 * - venue_later [checkbox]
 * - venue [select]
 * - Organizer [select]
 * - Namn [input]
 * - Titel [input]
 * - email [email]
 * - Phone [input]
 * - FormLink [input]
 * - RegDate [date]
 * - Fullbokat [checkbox]
 * - Alert [textarea]
 * - Cancelled [checkbox]
 * - Category [select]
 * - Serie [select]
 * - SV [checkbox]
 * - EN [checkbox]
 * - Check [checkbox]
 * - Startpage [checkbox]
 * - Webb [multiselect]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\Events\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByRubrik($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByIngress($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByBody($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByImage1($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByAlt($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByCaption($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByStart($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByEnd($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByShowEnd($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByVenue_later($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByVenue($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByOrganizer($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByNamn($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByTitel($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByEmail($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByPhone($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByFormLink($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByRegDate($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByFullbokat($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByAlert($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByCancelled($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByCategory($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getBySerie($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getBySV($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByEN($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByCheck($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByStartpage($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\Events\Listing|\Pimcore\Model\DataObject\Events|null getByWebb($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class Events extends Concrete
{
protected $o_classId = "16";
protected $o_className = "Events";
protected $Rubrik;
protected $Ingress;
protected $Body;
protected $Image1;
protected $Alt;
protected $Caption;
protected $Video;
protected $Start;
protected $End;
protected $ShowEnd;
protected $venue_later;
protected $venue;
protected $Organizer;
protected $Namn;
protected $Titel;
protected $email;
protected $Phone;
protected $FormLink;
protected $RegDate;
protected $Fullbokat;
protected $Alert;
protected $Cancelled;
protected $Category;
protected $Serie;
protected $SV;
protected $EN;
protected $Check;
protected $Startpage;
protected $Webb;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\Events
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get Rubrik - Rubrik
* @return string|null
*/
public function getRubrik()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Rubrik");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Rubrik;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Rubrik - Rubrik
* @param string|null $Rubrik
* @return \Pimcore\Model\DataObject\Events
*/
public function setRubrik($Rubrik)
{
	$this->Rubrik = $Rubrik;

	return $this;
}

/**
* Get Ingress - Ingress
* @return string|null
*/
public function getIngress()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Ingress");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Ingress;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Ingress - Ingress
* @param string|null $Ingress
* @return \Pimcore\Model\DataObject\Events
*/
public function setIngress($Ingress)
{
	$this->Ingress = $Ingress;

	return $this;
}

/**
* Get Body - Text som beskriver evenemanget
* @return string|null
*/
public function getBody()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Body");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("Body")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Body - Text som beskriver evenemanget
* @param string|null $Body
* @return \Pimcore\Model\DataObject\Events
*/
public function setBody($Body)
{
	$this->Body = $Body;

	return $this;
}

/**
* Get Image1 - Bild
* @return \Pimcore\Model\Asset\Image|null
*/
public function getImage1()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Image1");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Image1;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Image1 - Bild
* @param \Pimcore\Model\Asset\Image|null $Image1
* @return \Pimcore\Model\DataObject\Events
*/
public function setImage1($Image1)
{
	$this->Image1 = $Image1;

	return $this;
}

/**
* Get Alt - Alt-text
* @return string|null
*/
public function getAlt()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Alt");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Alt;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Alt - Alt-text
* @param string|null $Alt
* @return \Pimcore\Model\DataObject\Events
*/
public function setAlt($Alt)
{
	$this->Alt = $Alt;

	return $this;
}

/**
* Get Caption - Bildtext
* @return string|null
*/
public function getCaption()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Caption");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Caption;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Caption - Bildtext
* @param string|null $Caption
* @return \Pimcore\Model\DataObject\Events
*/
public function setCaption($Caption)
{
	$this->Caption = $Caption;

	return $this;
}

/**
* Get Video - Video
* @return \Pimcore\Model\DataObject\Data\Video|null
*/
public function getVideo()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Video");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Video;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Video - Video
* @param \Pimcore\Model\DataObject\Data\Video|null $Video
* @return \Pimcore\Model\DataObject\Events
*/
public function setVideo($Video)
{
	$this->Video = $Video;

	return $this;
}

/**
* Get Start - Händelsen börjar
* @return \Carbon\Carbon|null
*/
public function getStart()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Start");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Start;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Start - Händelsen börjar
* @param \Carbon\Carbon|null $Start
* @return \Pimcore\Model\DataObject\Events
*/
public function setStart($Start)
{
	$this->Start = $Start;

	return $this;
}

/**
* Get End - Händelsen slutar
* @return \Carbon\Carbon|null
*/
public function getEnd()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("End");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->End;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set End - Händelsen slutar
* @param \Carbon\Carbon|null $End
* @return \Pimcore\Model\DataObject\Events
*/
public function setEnd($End)
{
	$this->End = $End;

	return $this;
}

/**
* Get ShowEnd - Visa ut sluttid
* @return bool|null
*/
public function getShowEnd()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("ShowEnd");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->ShowEnd;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set ShowEnd - Visa ut sluttid
* @param bool|null $ShowEnd
* @return \Pimcore\Model\DataObject\Events
*/
public function setShowEnd($ShowEnd)
{
	$this->ShowEnd = $ShowEnd;

	return $this;
}

/**
* Get venue_later - Lokal meddelas senare
* @return bool|null
*/
public function getVenue_later()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("venue_later");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->venue_later;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set venue_later - Lokal meddelas senare
* @param bool|null $venue_later
* @return \Pimcore\Model\DataObject\Events
*/
public function setVenue_later($venue_later)
{
	$this->venue_later = $venue_later;

	return $this;
}

/**
* Get venue - Lokal
* @return string|null
*/
public function getVenue()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("venue");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->venue;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set venue - Lokal
* @param string|null $venue
* @return \Pimcore\Model\DataObject\Events
*/
public function setVenue($venue)
{
	$this->venue = $venue;

	return $this;
}

/**
* Get Organizer - Arrangör
* @return string|null
*/
public function getOrganizer()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Organizer");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Organizer;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Organizer - Arrangör
* @param string|null $Organizer
* @return \Pimcore\Model\DataObject\Events
*/
public function setOrganizer($Organizer)
{
	$this->Organizer = $Organizer;

	return $this;
}

/**
* Get Namn - Kontaktperson
* @return string|null
*/
public function getNamn()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Namn");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Namn;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Namn - Kontaktperson
* @param string|null $Namn
* @return \Pimcore\Model\DataObject\Events
*/
public function setNamn($Namn)
{
	$this->Namn = $Namn;

	return $this;
}

/**
* Get Titel - Titel
* @return string|null
*/
public function getTitel()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Titel");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Titel;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Titel - Titel
* @param string|null $Titel
* @return \Pimcore\Model\DataObject\Events
*/
public function setTitel($Titel)
{
	$this->Titel = $Titel;

	return $this;
}

/**
* Get email - E-post
* @return string|null
*/
public function getEmail()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("email");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->email;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set email - E-post
* @param string|null $email
* @return \Pimcore\Model\DataObject\Events
*/
public function setEmail($email)
{
	$this->email = $email;

	return $this;
}

/**
* Get Phone - Telefon:
* @return string|null
*/
public function getPhone()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Phone");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Phone;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Phone - Telefon:
* @param string|null $Phone
* @return \Pimcore\Model\DataObject\Events
*/
public function setPhone($Phone)
{
	$this->Phone = $Phone;

	return $this;
}

/**
* Get FormLink - Länk till anmälan
* @return string|null
*/
public function getFormLink()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("FormLink");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->FormLink;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set FormLink - Länk till anmälan
* @param string|null $FormLink
* @return \Pimcore\Model\DataObject\Events
*/
public function setFormLink($FormLink)
{
	$this->FormLink = $FormLink;

	return $this;
}

/**
* Get RegDate - Sista anmälningsdag
* @return \Carbon\Carbon|null
*/
public function getRegDate()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("RegDate");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->RegDate;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set RegDate - Sista anmälningsdag
* @param \Carbon\Carbon|null $RegDate
* @return \Pimcore\Model\DataObject\Events
*/
public function setRegDate($RegDate)
{
	$this->RegDate = $RegDate;

	return $this;
}

/**
* Get Fullbokat - Evenemanget är fullbokat
* @return bool|null
*/
public function getFullbokat()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Fullbokat");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Fullbokat;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Fullbokat - Evenemanget är fullbokat
* @param bool|null $Fullbokat
* @return \Pimcore\Model\DataObject\Events
*/
public function setFullbokat($Fullbokat)
{
	$this->Fullbokat = $Fullbokat;

	return $this;
}

/**
* Get Alert - Meddelande
* @return string|null
*/
public function getAlert()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Alert");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Alert;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Alert - Meddelande
* @param string|null $Alert
* @return \Pimcore\Model\DataObject\Events
*/
public function setAlert($Alert)
{
	$this->Alert = $Alert;

	return $this;
}

/**
* Get Cancelled - Evenemanget är inställt
* @return bool|null
*/
public function getCancelled()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Cancelled");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Cancelled;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Cancelled - Evenemanget är inställt
* @param bool|null $Cancelled
* @return \Pimcore\Model\DataObject\Events
*/
public function setCancelled($Cancelled)
{
	$this->Cancelled = $Cancelled;

	return $this;
}

/**
* Get Category - Eventkategori
* @return string|null
*/
public function getCategory()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Category");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Category;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Category - Eventkategori
* @param string|null $Category
* @return \Pimcore\Model\DataObject\Events
*/
public function setCategory($Category)
{
	$this->Category = $Category;

	return $this;
}

/**
* Get Serie - Återkommande serie
* @return string|null
*/
public function getSerie()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Serie");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Serie;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Serie - Återkommande serie
* @param string|null $Serie
* @return \Pimcore\Model\DataObject\Events
*/
public function setSerie($Serie)
{
	$this->Serie = $Serie;

	return $this;
}

/**
* Get SV - Visa ut på svenska sidor
* @return bool|null
*/
public function getSV()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("SV");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->SV;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set SV - Visa ut på svenska sidor
* @param bool|null $SV
* @return \Pimcore\Model\DataObject\Events
*/
public function setSV($SV)
{
	$this->SV = $SV;

	return $this;
}

/**
* Get EN - Visa ut på engelska sidor
* @return bool|null
*/
public function getEN()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("EN");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->EN;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set EN - Visa ut på engelska sidor
* @param bool|null $EN
* @return \Pimcore\Model\DataObject\Events
*/
public function setEN($EN)
{
	$this->EN = $EN;

	return $this;
}

/**
* Get Check - Check
* @return bool|null
*/
public function getCheck()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Check");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Check;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Check - Check
* @param bool|null $Check
* @return \Pimcore\Model\DataObject\Events
*/
public function setCheck($Check)
{
	$this->Check = $Check;

	return $this;
}

/**
* Get Startpage - Visa på startsida
* @return bool|null
*/
public function getStartpage()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Startpage");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Startpage;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Startpage - Visa på startsida
* @param bool|null $Startpage
* @return \Pimcore\Model\DataObject\Events
*/
public function setStartpage($Startpage)
{
	$this->Startpage = $Startpage;

	return $this;
}

/**
* Get Webb - Webb
* @return string[]|null
*/
public function getWebb()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Webb");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Webb;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Webb - Webb
* @param string[]|null $Webb
* @return \Pimcore\Model\DataObject\Events
*/
public function setWebb($Webb)
{
	$this->Webb = $Webb;

	return $this;
}

}

