<?php
namespace samples\notes;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\notes\APIException;
use com\zoho\crm\api\notes\ActionWrapper;
use com\zoho\crm\api\notes\NotesOperations;
use com\zoho\crm\api\notes\SuccessResponse;

require_once "vendor/autoload.php";

class DeleteNote
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

    public static function deleteNote(string $noteId)
    {
        $notesOperations = new NotesOperations();
        
        $response = $notesOperations->deleteNote($noteId);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getData();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Details: ");
                        foreach ($successResponse->getDetails() as $key => $value) {
                            echo($key . ": " . $value . "\n");
                        }
                        echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Details: ");
                        if ($exception->getDetails() != null) {
                            foreach ($exception->getDetails() as $key => $value) {
                                echo($key . ": " . $value . "\n");
                            }
                        }
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: ");
                if ($exception->getDetails() != null) {
                    foreach ($exception->getDetails() as $key => $value) {
                        echo($key . ": " . $value . "\n");
                    }
                }
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
        }
    }
}

DeleteNote::initialize();
DeleteNote::deleteNote("1055806000012814005");
