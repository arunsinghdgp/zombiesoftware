<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SolrUtils
{
    private $_solrHostUrl = '';
    public function __construct($params)
    {
        $this->_solrHostUrl = $params['SolrUrlRoot'];
    }

    private function _getSolrRequestUrl($requestTyepe){
        $url = $this->_solrHostUrl;
        switch(strtolower($requestTyepe)){
            case "schema_add_field":
            case "schema_delete_field":
                $url .= "schema?wt=json";
                break;
            case "insert_document":
            case "update_document":
            case "delete_document":
                $url .= "update?commit=true";
                break;
            case "search_document":
            case "get_document":
            default:
                $url .= "select";
                break;
        }
        return $url;
    }

    private function makeCurlRequest($requestUrl, $method = "GET", $data = null, $httpHeader = array()){
        $ch = curl_init($requestUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if(strtolower($method) == "post" && $data != null){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            if(count($httpHeader) == 0){
                $httpHeader = array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data)
                );
            }
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        // get the result and parse to JSON
        $errStr = json_decode($result);
        if(isset($errStr)){ 
            return $errStr;
        }
        return true;
    }

    public function insertDataInSolrCore($data){
        return $this->makeCurlRequest($this->_getSolrRequestUrl("insert_document"), "POST", json_encode($data));
    }

    public function addSchemaField($data){
        return $this->makeCurlRequest($this->_getSolrRequestUrl("schema_add_field"), "POST", json_encode($data));
    }
}
