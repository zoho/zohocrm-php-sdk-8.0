<?php
namespace samples\sendmail;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\sendmail\SendMailOperations;
use com\zoho\crm\api\sendmail\Data;
use com\zoho\crm\api\sendmail\From;
use com\zoho\crm\api\sendmail\To;
use com\zoho\crm\api\sendmail\Cc;
use com\zoho\crm\api\sendmail\BodyWrapper;
use com\zoho\crm\api\sendmail\APIException;
use com\zoho\crm\api\sendmail\ActionWrapper;
use com\zoho\crm\api\sendmail\SuccessResponse;

require_once "vendor/autoload.php";

class SendMail
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

    public static function sendMail(string $recordId, string $moduleAPIName)
    {
        $sendMailOperations = new SendMailOperations($recordId, $moduleAPIName);
        $mail = new Data();
        $from = new From();
        $from->setUserName("user");
        $from->setEmail("abc@zohotet.com");
        $mail->setFrom($from);
        $to = new To();
        $to->setUserName("user2");
        $to->setEmail("abc1@zohotet.com");
        $mail->setTo([$to]);
        $cc = new Cc();
        $cc->setUserName("user3");
        $cc->setEmail("abc2@zohotet.com");
        $mail->setCc([$cc]);
        $mail->setSubject("Mail subject");
        $mail->setContent("<br><a href=\"{ConsentForm.en_US}\" id=\"ConsentForm\" class=\"en_US\" target=\"_blank\">Consent form link</a><br><br><br><br><br><h3><span style=\"background-color: rgb(254, 255, 102)\">REGARDS,</span></h3><div><span style=\"background-color: rgb(254, 255, 102)\">AZ</span></div><div><span style=\"background-color: rgb(254, 255, 102)\">ADMIN</span></div> <div></div>");
        // $mail->setConsentEmail(true);
        $mail->setMailFormat(new \com\zoho\crm\api\util\Choice("html"));
        $wrapper = new BodyWrapper();
        $wrapper->setData([$mail]);

        //Call sendMail method
        $response = $sendMailOperations->sendMail($wrapper);
        if($response != null)
        {
            echo("Status code : " . $response->getStatusCode() . "\n");
            $actionHandler = $response->getObject();
            if($actionHandler instanceof ActionWrapper)
            {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getData();
                foreach ($actionResponses as $actionResponse)
                {
                    if($actionResponse instanceof SuccessResponse)
                    {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Details: " );
                        if($successResponse->getDetails() != null)
                        {
                            foreach ($successResponse->getDetails() as $keyName => $keyValue)
                            {
                                echo($keyName . ": " . $keyValue . "\n");
                            }
                        }
                        echo("Message: " . $successResponse->getMessage() . "\n");
                    }
                    else if($actionResponse instanceof APIException)
                    {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Details: " );
                        if($exception->getDetails() != null)
                        {
                            foreach ($exception->getDetails() as $keyName => $keyValue)
                            {
                                echo($keyName . ": " . $keyValue . "\n");
                            }
                        }
                        echo("Message: " . $exception->getMessage() . "\n");
                    }
                }
            }
            else if($actionHandler instanceof APIException)
            {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                if($exception->getDetails() != null)
                {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue)
                    {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

SendMail::initialize();
$recordId = "1055806000029058006";
$moduleAPIName = "Leads";
SendMail::sendMail($recordId, $moduleAPIName);
?>
