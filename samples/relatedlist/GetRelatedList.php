<?php
use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\relatedlists\RelatedListsOperations;
use com\zoho\crm\api\relatedlists\ResponseWrapper;
use com\zoho\crm\api\relatedlists\APIException;
use com\zoho\crm\api\relatedlists\GetRelatedListParam;
use com\zoho\crm\api\ParameterMap;

require_once "vendor/autoload.php";

class GetRelatedList 
{
   public static function initialize()
    {
        $environment = INDataCenter::PRODUCTION();
        $token = (new OAuthBuilder())
            ->clientId("client_id")
            ->clientSecret("client_secret")
            ->refreshToken("refresh_token")
            ->build();
        (new InitializeBuilder())
            ->environment($environment)
            ->token($token)
            ->initialize();
    }

    public static function getRelatedList(string $relatedListId, ?string $layoutId = null) 
    {
        $relatedListsOperations = new RelatedListsOperations(null);
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetRelatedListParam::module(), "Leads");
        $response = $relatedListsOperations->getRelatedList($relatedListId, $paramInstance);
        
        if($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");

            if(in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $relatedLists = $responseWrapper->getRelatedLists();
            
                foreach($relatedLists as $relatedList) {
                    echo("RelatedList SequenceNumber: " . $relatedList->getSequenceNumber() . "\n");
                    echo("RelatedList DisplayLabel: " . $relatedList->getDisplayLabel() . "\n");
                    echo("RelatedList APIName: " . $relatedList->getAPIName() . "\n");
                    echo("RelatedList Module: " . print_r($relatedList->getModule()) . "\n");
                    echo("RelatedList Name: " . $relatedList->getName() . "\n");
                    echo("RelatedList Action: " . $relatedList->getAction() . "\n");
                    echo("RelatedList ID: " . $relatedList->getId() . "\n");
                    echo("RelatedList Href: " . $relatedList->getHref() . "\n");
                    echo("RelatedList Type: " . $relatedList->getType() . "\n");
                }
            }
            else if($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: ");
                foreach($exception->getDetails() as $key => $value) {
                    echo($key . ": " .$value . "\n");
                }
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetRelatedList::initialize();
GetRelatedList::getRelatedList("1055806000027545142", "440248001");
?>