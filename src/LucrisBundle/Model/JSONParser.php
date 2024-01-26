<?php
namespace LucrisBundle\Model;

/**
* This class gets data from Lucris/Pure REST api.
*
* @link https://lucris.lub.lu.se/ws/api/513/api-docs/index.html - Pure api docs
* Specified for EHL/LUSEM - organization.
*/
class JSONParser
{
    /**
    * Data returned from cURL request
    * @var json
    */
    private $jsonData;

    /**
    * Storing the mapped organisation data from Lucris
    * @var array
    */
    private $organisationItems = [];

    /**
    * Storing the mapped person data from Lucris
    * @var array
    */
    private $personItems = [];

    /**
    * Constructor. Loads cURL session
    */
    public function __construct($url)
    {
        // Open cURL handle
        $ch = curl_init();
        // Set URL to GET by using the CURLOPT_URL option
        curl_setopt($ch, CURLOPT_URL, $url);
        // Set format of HTTP header using the CURLOPT_HTTPHEADER option
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
        // Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set CURLOPT_FOLLOWLOCATION to true to follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // Set CURLOPT_FAILONERROR to fail verbosely if the HTTP code returned is greater than or equal to 400
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        // Execute the request
        $data = curl_exec($ch);

        if (!curl_errno($ch)) {
            $this->jsonData = json_decode($data, true);
        }
        else {
            // Add log to lucris.php
            \Pimcore\Log\Simple::log("lucris", "LUCRIS.ERROR Failed to fetch url: $url ! " . curl_error($ch) . __FILE__ . " Line: " . __LINE__);
        }

        // Close the cURL handle
        curl_close($ch);
    }

    /**
    * Validate the results from the Lucris/Pure REST api
    * @return boolean
    */
    public function validResult()
    {
        $count = $this->jsonData['count'];
        return ($count !== "0" && !empty($count));
    }

    /**
    * Return the number in the count field
    * @return string
    */
    public function getCount()
    {
        $count = $this->jsonData['count'];
        return $count;
    }

    /**
    * Get the jsonData
    * @return array
    */
    public function getJsonData()
    {
        return $this->jsonData;
    }

    /**
    * Get the organisation items in array format
    * Note: first you need to use the mapOrganisationData() method
    * @return array
    */
    public function getOrganisationItems()
    {
        return $this->organisationItems;
    }

    /**
    * Map the necessary data from the cURL Json data
    * Data is stored in $this->organisationItems
    */
    public function mapOrganisationData()
    {
        $jsonData = $this->jsonData;
        foreach ($jsonData['items'] as $org) {
            $item = [];

            // Uuid
            $item['uuid'] = $org['uuid'];

            // SourceId
            $item['sourceId'] = $org['externalId'];

            // Name
            $item['name']['en'] = $org['name']['text'][0]['value'];
            $item['name']['sv'] = $org['name']['text'][1]['value'];

            // PortalUrl
            $item['portalUrl']['en'] = $org['info']['portalUrl'];
            $item['portalUrl']['sv'] = str_replace('/en/', '/sv/', $org['info']['portalUrl']);

            // Set organisationItems
            $this->organisationItems[] = $item;
        }
    }

    /**
    * Get the person items in array format
    * Note: first you need to use the mapPersonData() method
    * @return array
    */
    public function getPersonItems()
    {
        return $this->personItems;
    }

    /**
    * Map the necessary data from the cURL json data
    * Data is stored in $this->PersonItems
    */
    public function mapPersonData()
    {
        $jsonData = $this->jsonData;
        foreach ($jsonData['items'] as $person) {
            $item = [];

            // Uuid
            $item['uuid'] = $person['uuid'];

            // Uid
            $item['uid'] = str_replace('@lu.se', '', $person['externalId']);

            // Name
            $item['name'] = $person['name']['firstName'] . ' ' . $person['name']['lastName'];
            $item['firstName'] = $person['name']['firstName'];
            $item['lastName'] = $person['name']['lastName'];

            // Modified
            $date = new \DateTime($person['info']['modifiedDate']);
            $modified = $date->format('Y-m-d H:i:s');
            $item["modified"] = $modified;

            // PortalUrl
            if ($person['info']['portalUrl']) {
                $item['portalUrl']['en'] = $person['info']['portalUrl'];
                $item['portalUrl']['sv'] = str_replace('/en/', '/sv/', $person['info']['portalUrl']);
            }

            // Visibility
            $item['visibility'] = $person['visibility']['key'];

            // UKA(area) - UKÄ subject classification & Keyword (freetext)
            if ($person['keywordGroups'][0]['keywordContainers']) {
                foreach ($person['keywordGroups'] as $keyword) {
                    foreach ($keyword['keywordContainers'] as $key) {
                        // UKA(area) - UKÄ subject classification
                        if ($key['structuredKeyword']) {
                            foreach ($key['structuredKeyword']['term']['text'] as $term) {
                                if ($term['locale'] == 'en_GB') {
                                    $item["uka"]['en'] = (array) $term['value'];
                                }
                                elseif ($term['locale'] == 'sv_SE') {
                                    $item["uka"]['sv'] = (array) $term['value'];
                                }
                            }
                        }
                        // Keyword (freetext)
                        if ($key['freeKeywords']) {
                            foreach ($key['freeKeywords'] as $freeKeyword) {
                                if ($freeKeyword['locale'] == 'en_GB') {
                                    $item["keyword"]['en'] = (array) $freeKeyword['freeKeywords'][0];
                                }
                                elseif ($freeKeyword['locale'] == 'sv_SE') {
                                    $item["keyword"]['sv'] = (array) $freeKeyword['freeKeywords'][0];
                                }
                            }
                        }
                    }
                }
            }

            // Organisation
            foreach ($person['staffOrganisationAssociations'] as $org) {
                $item['org']['sourceId'][] = $org['organisationalUnit']['externalId'];
            }

            // Set personItems
            $this->personItems[] = $item;
        }
    }
}