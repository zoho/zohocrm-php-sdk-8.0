<?php
namespace samples\notes;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\notes\APIException;
use com\zoho\crm\api\notes\GetNoteHeader;
use com\zoho\crm\api\notes\GetNoteParam;
use com\zoho\crm\api\notes\NotesOperations;
use com\zoho\crm\api\notes\ResponseWrapper;

require_once "vendor/autoload.php";

class GetNote
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

    public static function getNote(string $noteId)
    {
        $notesOperations = new NotesOperations();
        
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetNoteParam::fields(), "Note_Title,Note_Content");
        
        $headerInstance = new HeaderMap();
        $datetime = date_create("2019-05-07T15:32:24")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $headerInstance->add(GetNoteHeader::IfModifiedSince(), $datetime);
        
        $response = $notesOperations->getNote($noteId, $paramInstance, $headerInstance);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $notes = $responseWrapper->getData();
                
                foreach ($notes as $note) {
                    echo("Note ID: " . $note->getId() . "\n");
                    echo("Note Title: " . $note->getNoteTitle() . "\n");
                    echo("Note Content: " . $note->getNoteContent() . "\n");
                    
                    $owner = $note->getOwner();
                    if ($owner != null) {
                        echo("Note Owner Name: " . $owner->getName() . "\n");
                        echo("Note Owner ID: " . $owner->getId() . "\n");
                        echo("Note Owner Email: " . $owner->getEmail() . "\n");
                    }
                    
                    echo("Note Modified Time: ");
                    print_r($note->getModifiedTime());
                    echo("\n");
                    
                    echo("Note Created Time: ");
                    print_r($note->getCreatedTime());
                    echo("\n");
                    
                    $parentId = $note->getParentId();
                    if ($parentId != null) {
                        print_r($parentId);
                        echo("Note Parent Record ID: " . $parentId->getId() . "\n");
                    }
                    
                    echo("Note Editable: " . $note->getEditable() . "\n");
                    echo("Note IsSharedToClient: " . $note->getIsSharedToClient() . "\n");
                    echo("Note State: " . $note->getState() . "\n");
                    echo("Note Size: " . $note->getSize() . "\n");
                    
                    if ($note->getVoiceNote() != null) {
                        echo("Note VoiceNote: " . $note->getVoiceNote() . "\n");
                    }
                    
                    $modifiedBy = $note->getModifiedBy();
                    if ($modifiedBy != null) {
                        echo("Note Modified By Name: " . $modifiedBy->getName() . "\n");
                        echo("Note Modified By ID: " . $modifiedBy->getId() . "\n");
                    }
                    
                    $createdBy = $note->getCreatedBy();
                    if ($createdBy != null) {
                        echo("Note Created By Name: " . $createdBy->getName() . "\n");
                        echo("Note Created By ID: " . $createdBy->getId() . "\n");
                    }
                    
                    $attachments = $note->getAttachments();
                    if ($attachments != null && count($attachments) > 0) {
                        foreach ($attachments as $attachment) {
                            echo("Attachment ID: " . $attachment->getId() . "\n");
                            echo("Attachment File Name: " . $attachment->getFileName() . "\n");
                            echo("Attachment Size: " . $attachment->getSize() . "\n");
                            echo("Attachment File Type: " . $attachment->getType() . "\n");
                            
                            $attachmentOwner = $attachment->getOwner();
                            if ($attachmentOwner != null) {
                                echo("Attachment Owner Name: " . $attachmentOwner->getName() . "\n");
                            }
                        }
                    }
                    
                    echo("\n");
                }
                
                $info = $responseWrapper->getInfo();
                if ($info != null) {
                    if ($info->getPerPage() != null) {
                        echo("Note Info PerPage: " . $info->getPerPage() . "\n");
                    }
                    if ($info->getCount() != null) {
                        echo("Note Info Count: " . $info->getCount() . "\n");
                    }
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Details: ");
                foreach ($exception->getDetails() as $key => $value) {
                    echo($key . ": " . $value . "\n");
                }
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetNote::initialize();
GetNote::getNote("1055806000012814006");
