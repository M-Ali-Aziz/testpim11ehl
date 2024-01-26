<?php

namespace UniversityBundle\Document\Areabrick;

use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Model\Document\Editable\Area\Info;
use Pimcore\Model\DataObject;

class PartnerUniversities extends AbstractTemplateAreabrick
{
    /**
     * @inheritdoc
     */
    public function getTemplateLocation()
    {
        return static::TEMPLATE_LOCATION_BUNDLE;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'List Partner Universities';
    }

    /**
     * @inheritdoc
     */
    public function getVersion()
    {
        return '1.0';
    }

    /**
     * @inheritdoc
     */
    public function getIcon()
    {
        return '/bundles/pimcoreadmin/img/flat-color-icons/globe-multiple.svg';
    }

    /**
     * Help Function
     * Set Condition String
     * @param string
     * @param string
     * @param string
     * @return string
     */
    Private function setConditionString($conditionStr, $fieldName, $fieldValue)
    {
        return ($conditionStr) ?
            " AND " . $fieldName . " LIKE '%" . $fieldValue . "%'" :
            $fieldName . " LIKE '%" . $fieldValue . "%'";
    }

    /**
     * Help Function
     * Get universities for only regionQuery
     * @param object
     * @param string
     * @return array
     */
    private function getRegionUniversities($universities, $regionQuery)
    {
        $universityArr = [];
        foreach ($universities as $uni) {
            if ($uni->getRegion() == $regionQuery ) {
                $universityArr[] = $uni;
            }
        }

        return $universityArr;
    }

    /**
     * Help Function
     * Get FieldDefinition Options from University Class
     * @param string
     * @return array
     */
    Private function FieldDefinitionOptions($fieldName)
    {
        $class = DataObject\ClassDefinition::getByName('University');
        return $class->getFieldDefinition($fieldName)->getOptions();
    }

    /**
     * Help Function
     * Count Number of educations for each region
     * @param object
     * @param array
     * @return array
     */
    private function countUniPerRegion($universities, $regionsOptions)
    {
        $countRegionArr = [];

        foreach ($regionsOptions as $reg) {
            $countRegionArr[$reg['value']] = 0;   
        }

        foreach ($universities as $uni) {
            $countRegionArr[$uni->getRegion()] += 1;
        }

        return $countRegionArr;
    }

    // Other methods defined above!!!
    // Action method
    public function action(Info $info)
    {
        // get property values
        $limit = ($limit = $this->getDocumentTag($info->getDocument(), 'numeric', 'numberOfUniversities')->getData()) ? $limit : 10;
        $saasLink = ($saasLink = $this->getDocumentTag($info->getDocument(), 'input', 'saasLink')->getData()) ? $saasLink : 'https://saas.solenovo.fi/solemovefront/destinationSearch/9408490/';
        $page = $info->getRequest()->get('page');
//        $offset = (!$page || $page == '1') ? 0 : $limit * ($page -1);
        $searchQuery = $info->getRequest()->get('search');
        $regionQuery = $info->getRequest()->get('region');
        $condition = '';
        $filterQuery = [
            'subject' => $info->getRequest()->get('subject'),
            'year' => $info->getRequest()->get('year'),
            'period' => $info->getRequest()->get('period'),
            'mobilityType' => $info->getRequest()->get('mobilityType'),
            'country' => $info->getRequest()->get('country'),
            'programme' => $info->getRequest()->get('programme')
        ];

        // Filter for searchQuery
        if ($searchQuery) {
            $condition .= $this->setConditionString($condition, 'University', $searchQuery);
        }

        // Filter for Subject
        if ($filterQuery['subject']) {
            $condition .= $this->setConditionString($condition, 'Subject', $filterQuery['subject']);
        }

        // Filter for Year
        if ($filterQuery['year']) {
            $condition .= $this->setConditionString($condition, 'Year', $filterQuery['year']);
        }

        // Filter for Period
        if ($filterQuery['period']) {
            $condition .= $this->setConditionString($condition, 'Period', $filterQuery['period']);
        }

        // Filter for MobilityType
        if ($filterQuery['mobilityType']) {
            $condition .= $this->setConditionString($condition, 'MobilityType', $filterQuery['mobilityType']);
        }

        // Filter for Country
        if ($filterQuery['country']) {
            $condition .= $this->setConditionString($condition, 'Country', $filterQuery['country']);
        }

        // Filter for Programme
        if ($filterQuery['programme']) {
            $condition .= $this->setConditionString($condition, 'Programme', $filterQuery['programme']);
        }

        /**
         * Listing University DataObject
         */
        $universities = DataObject\University::getList([
            "orderKey" => ["Country", "University"],
            "order" => "asc"
        ]);
        if ($condition) {
            $universities->setCondition($condition);
        }

        // Filter for regionQuery
        if ($regionQuery) {
            $regionUniversities = $this->getRegionUniversities($universities, $regionQuery);
        }

        // Get Region FieldDefinition Options
        $regionsOptions = $this->FieldDefinitionOptions('Region');

        // Set active class for Region filter 
        $regionActiveClass = ['all'=>'active'];
        foreach ($regionsOptions as $r) {
            $regionActiveClass[$r['value']] = '';
        }
        if ($regionQuery) {
            $regionActiveClass['all'] = '';
            $regionActiveClass[$regionQuery] = 'active';
        }

        // Get Subject Area FieldDefinition Options
        $subjectOptions = $this->FieldDefinitionOptions('Subject');

        // Get Year FieldDefinition Options
        $yearOptions = $this->FieldDefinitionOptions('Year');

        // Get Period FieldDefinition Options
        $periodOptions = $this->FieldDefinitionOptions('Period');

        // Get MobilityType FieldDefinition Options
        $mobilityTypeOptions = $this->FieldDefinitionOptions('MobilityType');

        // Get Country FieldDefinition Options
        $countryOptions = $this->FieldDefinitionOptions('Country');

        // Get Programme FieldDefinition Options
        $programmeOptions = $this->FieldDefinitionOptions('Programme');

        // Set CountUni
        $countUni = ($universities) ? count($universities) : '';

        // Count Number of educations for each region
        $countUniRegion = ($countUni) ? $this->countUniPerRegion($universities, $regionsOptions) : [];

        // Set paginator universities
        $paginatorUniversities = (is_array($regionUniversities)) ? $regionUniversities : $universities;

        // Paginator
        try {
            if (is_array($paginatorUniversities)) {
                $paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($paginatorUniversities));
            } else {
                $paginator = new \Zend\Paginator\Paginator($paginatorUniversities);
            }
            $paginator->setCurrentPageNumber($page);
            $paginator->setItemCountPerPage($limit);
            $paginator->setPageRange(5);
        }
        catch(\Exception $e) {
            $paginator = null;
        }

        // Send data to view
        $info->setParams([
            'universities' => $universities,
            'paginatorUniversities' => $paginatorUniversities,
            'paginator' => $paginator,
            'countUni' => $countUni,
            'countUniRegion' => $countUniRegion,
            'saasLink' => $saasLink,
            'regionsOptions' => $regionsOptions,
            'subjectOptions' => $subjectOptions,
            'yearOptions' => $yearOptions,
            'periodOptions' => $periodOptions,
            'mobilityTypeOptions' => $mobilityTypeOptions,
            'countryOptions' => $countryOptions,
            'programmeOptions' => $programmeOptions
        ]);
    }
}
