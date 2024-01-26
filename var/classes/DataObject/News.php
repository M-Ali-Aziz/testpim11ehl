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
 * - YouTube [input]
 * - Rubrik3 [input]
 * - Body3 [wysiwyg]
 * - Image3 [image]
 * - Alt3 [input]
 * - Rubrik2 [input]
 * - Body2 [wysiwyg]
 * - Image2 [image]
 * - Alt2 [input]
 * - Category [select]
 * - Subject [multiselect]
 * - SubSubject [multiselect]
 * - Staff [multiselect]
 * - Webb [multiselect]
 * - SV [checkbox]
 * - EN [checkbox]
 * - Ettan [checkbox]
 * - Startpage [checkbox]
 * - EHL [checkbox]
 * - Snippet [input]
 * - Color [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\News\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByRubrik($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByIngress($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByBody($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByImage1($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByAlt($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByCaption($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByYouTube($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByRubrik3($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByBody3($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByImage3($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByAlt3($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByRubrik2($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByBody2($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByImage2($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByAlt2($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByCategory($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getBySubject($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getBySubSubject($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByStaff($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByWebb($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getBySV($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByEN($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByEttan($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByStartpage($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByEHL($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getBySnippet($value, $limit = 0, $offset = 0, $objectTypes = null)
* @method static \Pimcore\Model\DataObject\News\Listing|\Pimcore\Model\DataObject\News|null getByColor($value, $limit = 0, $offset = 0, $objectTypes = null)
*/

class News extends Concrete
{
protected $o_classId = "13";
protected $o_className = "News";
protected $Rubrik;
protected $Ingress;
protected $Body;
protected $Image1;
protected $Alt;
protected $Caption;
protected $Video;
protected $YouTube;
protected $Rubrik3;
protected $Body3;
protected $Image3;
protected $Alt3;
protected $Rubrik2;
protected $Body2;
protected $Image2;
protected $Alt2;
protected $Category;
protected $Subject;
protected $SubSubject;
protected $Staff;
protected $Webb;
protected $SV;
protected $EN;
protected $Ettan;
protected $Startpage;
protected $EHL;
protected $Snippet;
protected $Color;


/**
* @param array $values
* @return \Pimcore\Model\DataObject\News
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get Rubrik - 
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
* Set Rubrik - 
* @param string|null $Rubrik
* @return \Pimcore\Model\DataObject\News
*/
public function setRubrik($Rubrik)
{
	$this->Rubrik = $Rubrik;

	return $this;
}

/**
* Get Ingress - 
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
* Set Ingress - 
* @param string|null $Ingress
* @return \Pimcore\Model\DataObject\News
*/
public function setIngress($Ingress)
{
	$this->Ingress = $Ingress;

	return $this;
}

/**
* Get Body - Text
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
* Set Body - Text
* @param string|null $Body
* @return \Pimcore\Model\DataObject\News
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
* @return \Pimcore\Model\DataObject\News
*/
public function setImage1($Image1)
{
	$this->Image1 = $Image1;

	return $this;
}

/**
* Get Alt - 
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
* Set Alt - 
* @param string|null $Alt
* @return \Pimcore\Model\DataObject\News
*/
public function setAlt($Alt)
{
	$this->Alt = $Alt;

	return $this;
}

/**
* Get Caption - 
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
* Set Caption - 
* @param string|null $Caption
* @return \Pimcore\Model\DataObject\News
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
* @return \Pimcore\Model\DataObject\News
*/
public function setVideo($Video)
{
	$this->Video = $Video;

	return $this;
}

/**
* Get YouTube - YouTube videoklipp-ID
* @return string|null
*/
public function getYouTube()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("YouTube");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->YouTube;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set YouTube - YouTube videoklipp-ID
* @param string|null $YouTube
* @return \Pimcore\Model\DataObject\News
*/
public function setYouTube($YouTube)
{
	$this->YouTube = $YouTube;

	return $this;
}

/**
* Get Rubrik3 - 
* @return string|null
*/
public function getRubrik3()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Rubrik3");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Rubrik3;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Rubrik3 - 
* @param string|null $Rubrik3
* @return \Pimcore\Model\DataObject\News
*/
public function setRubrik3($Rubrik3)
{
	$this->Rubrik3 = $Rubrik3;

	return $this;
}

/**
* Get Body3 - Text
* @return string|null
*/
public function getBody3()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Body3");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("Body3")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Body3 - Text
* @param string|null $Body3
* @return \Pimcore\Model\DataObject\News
*/
public function setBody3($Body3)
{
	$this->Body3 = $Body3;

	return $this;
}

/**
* Get Image3 - Bild
* @return \Pimcore\Model\Asset\Image|null
*/
public function getImage3()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Image3");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Image3;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Image3 - Bild
* @param \Pimcore\Model\Asset\Image|null $Image3
* @return \Pimcore\Model\DataObject\News
*/
public function setImage3($Image3)
{
	$this->Image3 = $Image3;

	return $this;
}

/**
* Get Alt3 - 
* @return string|null
*/
public function getAlt3()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Alt3");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Alt3;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Alt3 - 
* @param string|null $Alt3
* @return \Pimcore\Model\DataObject\News
*/
public function setAlt3($Alt3)
{
	$this->Alt3 = $Alt3;

	return $this;
}

/**
* Get Rubrik2 - 
* @return string|null
*/
public function getRubrik2()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Rubrik2");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Rubrik2;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Rubrik2 - 
* @param string|null $Rubrik2
* @return \Pimcore\Model\DataObject\News
*/
public function setRubrik2($Rubrik2)
{
	$this->Rubrik2 = $Rubrik2;

	return $this;
}

/**
* Get Body2 - Text
* @return string|null
*/
public function getBody2()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Body2");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("Body2")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Body2 - Text
* @param string|null $Body2
* @return \Pimcore\Model\DataObject\News
*/
public function setBody2($Body2)
{
	$this->Body2 = $Body2;

	return $this;
}

/**
* Get Image2 - Bild
* @return \Pimcore\Model\Asset\Image|null
*/
public function getImage2()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Image2");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Image2;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Image2 - Bild
* @param \Pimcore\Model\Asset\Image|null $Image2
* @return \Pimcore\Model\DataObject\News
*/
public function setImage2($Image2)
{
	$this->Image2 = $Image2;

	return $this;
}

/**
* Get Alt2 - 
* @return string|null
*/
public function getAlt2()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Alt2");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Alt2;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Alt2 - 
* @param string|null $Alt2
* @return \Pimcore\Model\DataObject\News
*/
public function setAlt2($Alt2)
{
	$this->Alt2 = $Alt2;

	return $this;
}

/**
* Get Category - Kärnverksamhet
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
* Set Category - Kärnverksamhet
* @param string|null $Category
* @return \Pimcore\Model\DataObject\News
*/
public function setCategory($Category)
{
	$this->Category = $Category;

	return $this;
}

/**
* Get Subject - Ämnesområde
* @return string[]|null
*/
public function getSubject()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Subject");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Subject;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Subject - Ämnesområde
* @param string[]|null $Subject
* @return \Pimcore\Model\DataObject\News
*/
public function setSubject($Subject)
{
	$this->Subject = $Subject;

	return $this;
}

/**
* Get SubSubject - Ämnen, övriga
* @return string[]|null
*/
public function getSubSubject()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("SubSubject");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->SubSubject;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set SubSubject - Ämnen, övriga
* @param string[]|null $SubSubject
* @return \Pimcore\Model\DataObject\News
*/
public function setSubSubject($SubSubject)
{
	$this->SubSubject = $SubSubject;

	return $this;
}

/**
* Get Staff - Staff pages
* @return string[]|null
*/
public function getStaff()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Staff");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Staff;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Staff - Staff pages
* @param string[]|null $Staff
* @return \Pimcore\Model\DataObject\News
*/
public function setStaff($Staff)
{
	$this->Staff = $Staff;

	return $this;
}

/**
* Get Webb - 
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
* Set Webb - 
* @param string[]|null $Webb
* @return \Pimcore\Model\DataObject\News
*/
public function setWebb($Webb)
{
	$this->Webb = $Webb;

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
* @return \Pimcore\Model\DataObject\News
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
* @return \Pimcore\Model\DataObject\News
*/
public function setEN($EN)
{
	$this->EN = $EN;

	return $this;
}

/**
* Get Ettan - Visa ut på ettan (huvudnyhet)
* @return bool|null
*/
public function getEttan()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Ettan");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Ettan;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Ettan - Visa ut på ettan (huvudnyhet)
* @param bool|null $Ettan
* @return \Pimcore\Model\DataObject\News
*/
public function setEttan($Ettan)
{
	$this->Ettan = $Ettan;

	return $this;
}

/**
* Get Startpage - Visa ut på startsida
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
* Set Startpage - Visa ut på startsida
* @param bool|null $Startpage
* @return \Pimcore\Model\DataObject\News
*/
public function setStartpage($Startpage)
{
	$this->Startpage = $Startpage;

	return $this;
}

/**
* Get EHL - Kommunikationsavdelningen
* @return bool|null
*/
public function getEHL()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("EHL");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->EHL;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set EHL - Kommunikationsavdelningen
* @param bool|null $EHL
* @return \Pimcore\Model\DataObject\News
*/
public function setEHL($EHL)
{
	$this->EHL = $EHL;

	return $this;
}

/**
* Get Snippet - Snippet
* @return string|null
*/
public function getSnippet()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Snippet");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Snippet;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Snippet - Snippet
* @param string|null $Snippet
* @return \Pimcore\Model\DataObject\News
*/
public function setSnippet($Snippet)
{
	$this->Snippet = $Snippet;

	return $this;
}

/**
* Get Color - Color
* @return string|null
*/
public function getColor()
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Color");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->Color;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set Color - Color
* @param string|null $Color
* @return \Pimcore\Model\DataObject\News
*/
public function setColor($Color)
{
	$this->Color = $Color;

	return $this;
}

}

