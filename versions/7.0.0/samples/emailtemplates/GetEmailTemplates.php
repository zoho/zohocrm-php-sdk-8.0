<?php
namespace samples\emailtemplates;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\emailtemplates\EmailTemplatesOperations;
use com\zoho\crm\api\emailtemplates\ResponseWrapper;
use com\zoho\crm\api\emailtemplates\APIException;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\emailtemplates\GetEmailTemplatesParam;

require_once "vendor/autoload.php";

class GetEmailTemplates
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

    public static function getEmailTemplates(string $module)
    {
        $emailTemplatesOperations = new EmailTemplatesOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetEmailTemplatesParam::module(), $module);
        $response = $emailTemplatesOperations->getEmailTemplates($paramInstance);
        if($response != null)
        {
            echo("Status code : " . $response->getStatusCode() . "\n");
            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
                return;
            }
            $responseHandler = $response->getObject();
            if($responseHandler instanceof ResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $emailTemplates = $responseWrapper->getEmailTemplates();
                foreach($emailTemplates as $emailTemplate)
                {
                    echo("EmailTemplate CreatedTime: "); print_r($emailTemplate->getCreatedTime()); echo("\n");
                    $attachments = $emailTemplate->getAttachments();
                    if($attachments != null)
                    {
                        foreach($attachments as $attachment)
                        {
                            echo("Attachment ID: " . $attachment->getId() . "\n");
                            echo("Attachment FileName: " . $attachment->getFileName() . "\n");
                            echo("Attachment Size: " . $attachment->getSize() . "\n");
                        }
                    }
                    echo("EmailTemplate Subject: " . $emailTemplate->getSubject() . "\n");
                    $module = $emailTemplate->getModule();
                    if($module != null)
                    {
                        echo("EmailTemplate Module Name : " . $module->getAPIName() . "\n");
                        echo("EmailTemplate Module Id : " . $module->getId() . "\n");
                    }
                    $createdBy = $emailTemplate->getCreatedBy();
                    if($createdBy != null)
                    {
                        echo("EmailTemplate Created By User-ID: " . $createdBy->getId(). "\n");
                        echo("EmailTemplate Created By user-Name: " . $createdBy->getName(). "\n");
                    }
                    echo("EmailTemplate ModifiedTime: "); print_r($emailTemplate->getModifiedTime()); echo("\n");
                    $folder = $emailTemplate->getFolder();
                    if($folder != null)
                    {
                        echo("EmailTemplate Folder Id: " . $folder->getId(). "\n");
                        echo("EmailTemplate Folder Name: " . $folder->getName(). "\n");
                    }
                    echo("EmailTemplate LastUsageTime: "); print_r($emailTemplate->getLastUsageTime()); echo("\n");
                    echo("EmailTemplate Associated: "); print_r($emailTemplate->getAssociated()); echo("\n");
                    echo("EmailTemplate Name: " . $emailTemplate->getName() . "\n");
                    echo("EmailTemplate ConsentLinked: "); print_r($emailTemplate->getConsentLinked()); echo("\n");
                    $modifiedBy = $emailTemplate->getModifiedBy();
                    if($modifiedBy != null)
                    {
                        echo("EmailTemplate Modified By User-ID: " . $modifiedBy->getId(). "\n");
                        echo("EmailTemplate Modified By user-Name: " . $modifiedBy->getName(). "\n");
                    }
                    echo("EmailTemplate ID: " . $emailTemplate->getId() . "\n");
                    echo("EmailTemplate EditorMode: " . $emailTemplate->getEditorMode() . "\n");
                    echo("EmailTemplate Category: " . $emailTemplate->getCategory() . "\n");
                    echo("EmailTemplate Active: "); print_r($emailTemplate->getActive()); echo("\n");
                    echo("EmailTemplate Favorite: "); print_r($emailTemplate->getFavorite()); echo("\n");
                    echo("EmailTemplate Description: " . $emailTemplate->getDescription() . "\n");
                }
                $info = $responseWrapper->getInfo();
                if($info != null)
                {
                    echo("EmailTemplate Info PerPage : " . $info->getPerPage() . "\n");
                    echo("EmailTemplate Info Count : " . $info->getCount() . "\n");
                    echo("EmailTemplate Info Page : " . $info->getPage(). "\n");
                    echo("EmailTemplate Info MoreRecords : "); print_r($info->getMoreRecords()); echo("\n");
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue());
                echo("Code: " . $exception->getCode()->getValue());
                echo("Details: " );
                foreach($exception->getDetails() as $key => $value)
                {
                    echo($key . ": " . $value);
                }
                echo("Message: " . $exception->getMessage());
            }
        }
    }
}

GetEmailTemplates::initialize();

$moduleAPIName = "Deals";
GetEmailTemplates::getEmailTemplates($moduleAPIName);