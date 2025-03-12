<?php
namespace samples\massdeletetags;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\massdeletetags\BodyWrapper;
use com\zoho\crm\api\massdeletetags\MassDelete;
use com\zoho\crm\api\massdeletetags\Module;
use com\zoho\crm\api\massdeletetags\Tag;
use com\zoho\crm\api\massdeletetags\MassDeleteTagsOperations;
use com\zoho\crm\api\massdeletetags\SuccessResponse;
use com\zoho\crm\api\massdeletetags\APIException;

class MassDeleteTags
{
    public static function initialize()
    {
        $environment = USDataCenter::PRODUCTION();
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

    public static function massDeleteTags()
    {
        $massDeleteTagsOperations = new MassDeleteTagsOperations();
        $request = new BodyWrapper();

        $massDelete = [];
        $massDelete1 = new MassDelete();

        $module = new Module();
        $module->setAPIName("Leads");
        $module->setId("72722000037");
        $massDelete1->setModule($module);

        $tags = [];

        $tag1 = new Tag();
        $tag1->setId("727225001006");
        $tags[] = $tag1;

        $tag2 = new Tag();
        $tag2->setId("7272250621007");
        $tags[] = $tag2;

        $massDelete1->setTags($tags);
        $massDelete[] = $massDelete1;
        $request->setMassDelete($massDelete);

        $response = $massDeleteTagsOperations->massDeleteTags($request);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . "\n";
            if ($response->isExpected()) {
                $actionResponse = $response->getObject();
                if ($actionResponse instanceof SuccessResponse) {
                    $successResponse = $actionResponse;
                    echo "Status: " . $successResponse->getStatus()->getValue() . "\n";
                    echo "Code: " . $successResponse->getCode()->getValue() . "\n";
                    echo "Details: \n";
                    foreach ($successResponse->getDetails() as $key => $value) {
                        echo $key . ": " . $value . "\n";
                    }
                    echo "Message: " . $successResponse->getMessage() . "\n";
                } elseif ($actionResponse instanceof APIException) {
                    $exception = $actionResponse;
                    echo "Status: " . $exception->getStatus()->getValue() . "\n";
                    echo "Code: " . $exception->getCode()->getValue() . "\n";
                    echo "Details: \n";
                    if ($exception->getDetails() != null) {
                        foreach ($exception->getDetails() as $key => $value) {
                            echo $key . ": " . $value . "\n";
                        }
                    }
                    echo "Message: " . $exception->getMessage() . "\n";
                }
            }
        }
    }
}

MassDeleteTags::initialize();
MassDeleteTags::massDeleteTags();
