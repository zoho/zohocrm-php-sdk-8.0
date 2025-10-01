<?php
namespace samples\record;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\layouts\Layouts;
use com\zoho\crm\api\record\APIException;
use com\zoho\crm\api\record\FileBodyWrapper;
use com\zoho\crm\api\record\FileDetails;
use com\zoho\crm\api\record\LineTax;
use com\zoho\crm\api\record\Participants;
use com\zoho\crm\api\record\PricingDetails;
use com\zoho\crm\api\record\RecordOperations;
use com\zoho\crm\api\record\RecurringActivity;
use com\zoho\crm\api\record\RemindAt;
use com\zoho\crm\api\record\ResponseWrapper;
use com\zoho\crm\api\tags\Tag;
use com\zoho\crm\api\record\GetRecordUsingExternalIdHeader;
use com\zoho\crm\api\record\Record;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\record\Comment;
use com\zoho\crm\api\record\Consent;
use com\zoho\crm\api\attachments\Attachment;
use com\zoho\crm\api\record\ImageUpload;
use com\zoho\crm\api\users\MinifiedUser;
use com\zoho\crm\api\record\GetRecordUsingExternalIdParam;

require_once "vendor/autoload.php";

class GetRecordUsingExternalId
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

    public static function getRecordUsingExternalId(string $moduleAPIName, string $externalFieldValue, string $destinationFolder)
    {
        $recordOperations = new RecordOperations($moduleAPIName);
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetRecordUsingExternalIdParam::approved(), "false");
        $paramInstance->add(GetRecordUsingExternalIdParam::converted(), "false");
        $fieldNames = array("Deal_Name", "Company");
        foreach ($fieldNames as $fieldName) {
            $paramInstance->add(GetRecordUsingExternalIdParam::fields(), $fieldName);
        }
        $startdatetime = date_create("2020-06-27T15:10:00");
        $paramInstance->add(GetRecordUsingExternalIdParam::startDateTime(), $startdatetime);
        $enddatetime = date_create("2020-06-29T15:10:00");
        $paramInstance->add(GetRecordUsingExternalIdParam::endDateTime(), $enddatetime);
        $paramInstance->add(GetRecordUsingExternalIdParam::territoryId(), "34770613051357");
        $paramInstance->add(GetRecordUsingExternalIdParam::includeChild(), "true");
        $headerInstance = new HeaderMap();
        $ifmodifiedsince = date_create("2020-06-02T11:03:06+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $headerInstance->add(GetRecordUsingExternalIdHeader::IfModifiedSince(), $ifmodifiedsince);
        // $headerInstance->add(GetRecordHeader::XEXTERNAL(), "Leads.External");
        //Call getRecordUsingExternalId method that takes externalFieldValue, moduleAPIName, paramInstance and headerInstance as parameter
        $response = $recordOperations->getRecordUsingExternalId($externalFieldValue, $paramInstance, $headerInstance);
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            if ($response->isExpected()) {
                $responseHandler = $response->getObject();
                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $records = $responseWrapper->getData();
                    if ($records != null) {
                        foreach ($records as $record) {
                            echo ("Record ID: " . $record->getId() . "\n");
                            $createdBy = $record->getCreatedBy();
                            if ($createdBy != null) {
                                echo ("Record Created By User-ID: " . $createdBy->getId() . "\n");
                                echo ("Record Created By User-Name: " . $createdBy->getName() . "\n");
                                echo ("Record Created By User-Email: " . $createdBy->getEmail() . "\n");
                            }
                            echo ("Record CreatedTime: ");
                            print_r($record->getCreatedTime());
                            echo ("\n");
                            $modifiedBy = $record->getModifiedBy();
                            if ($modifiedBy != null) {
                                echo ("Record Modified By User-ID: " . $modifiedBy->getId() . "\n");
                                echo ("Record Modified By User-Name: " . $modifiedBy->getName() . "\n");
                                echo ("Record Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                            }
                            echo ("Record ModifiedTime: ");
                            print_r($record->getModifiedTime());
                            echo ("\n");
                            $tags = $record->getTag();
                            if ($tags != null) {
                                foreach ($tags as $tag) {
                                    echo ("Record Tag Name: " . $tag->getName() . "\n");
                                    echo ("Record Tag ID: " . $tag->getId() . "\n");
                                }
                            }
                            //To get particular field value
                            echo ("Record Field Value: " . $record->getKeyValue("Last_Name") . "\n"); // FieldApiName
                            echo ("Record KeyValues : \n");
                            foreach ($record->getKeyValues() as $keyName => $value) {
                                if ($value != null) {
                                    if ((is_array($value) && sizeof($value) > 0) && isset($value[0])) {
                                        if ($value[0] instanceof FileDetails) {
                                            $fileDetails = $value;
                                            foreach ($fileDetails as $fileDetail) {
                                                echo ("Record FileDetails FileIds: " . $fileDetail->getFileIdS() . "\n");
                                                echo ("Record FileDetails FileNameS: " . $fileDetail->getFileNameS() . "\n");
                                                echo ("Record FileDetails SizeS: " . $fileDetail->getSizeS() . "\n");
                                                echo ("Record FileDetails ID: " . $fileDetail->getId() . "\n");
                                            }
                                        } else if ($value[0] instanceof Choice) {
                                            $choice = $value;
                                            foreach ($choice as $choiceValue) {
                                                echo ("Record " . $keyName . " : " . $choiceValue->getValue() . "\n");
                                            }
                                        } else if ($value[0] instanceof Tag) {
                                            $tagList = $value;
                                            foreach ($tagList as $tag) {
                                                echo ("Record Tag Name: " . $tag->getName() . "\n");
                                                echo ("Record Tag ID: " . $tag->getId() . "\n");
                                            }
                                        } else if ($value[0] instanceof PricingDetails) {
                                            $pricingDetails = $value;
                                            foreach ($pricingDetails as $pricingDetail) {
                                                echo ("Record PricingDetails ToRange: " . $pricingDetail->getToRange() . "\n");
                                                echo ("Record PricingDetails Discount: " . $pricingDetail->getDiscount() . "\n");
                                                echo ("Record PricingDetails ID: " . $pricingDetail->getId() . "\n");
                                                echo ("Record PricingDetails FromRange: " . $pricingDetail->getFromRange() . "\n");
                                            }
                                        } else if ($value[0] instanceof Participants) {
                                            $participants = $value;
                                            foreach ($participants as $participant) {
                                                echo ("RelatedRecord Participants Name: " . $participant->getName() . "\n");
                                                echo ("RelatedRecord Participants Invited: " . $participant->getInvited() . "\n");
                                                echo ("RelatedRecord Participants ID: " . $participant->getId() . "\n");
                                                echo ("RelatedRecord Participants Type: " . $participant->getType() . "\n");
                                                echo ("RelatedRecord Participants Participant: " . $participant->getParticipant() . "\n");
                                                echo ("RelatedRecord Participants Status: " . $participant->getStatus() . "\n");
                                            }
                                        } else if ($value[0] instanceof Record) {
                                            $recordList = $value;
                                            foreach ($recordList as $record1) {
                                                foreach ($record1->getKeyValues() as $key => $value1) {
                                                    echo ($key . " : ");
                                                    print_r($value1);
                                                    echo ("\n");
                                                }
                                            }
                                        } else if ($value[0] instanceof LineTax) {
                                            $lineTaxes = $value;
                                            foreach ($lineTaxes as $lineTax) {
                                                echo ("Record ProductDetails LineTax Percentage: " . $lineTax->getPercentage() . "\n");
                                                echo ("Record ProductDetails LineTax Name: " . $lineTax->getName() . "\n");
                                                echo ("Record ProductDetails LineTax Id: " . $lineTax->getId() . "\n");
                                                echo ("Record ProductDetails LineTax Value: " . $lineTax->getValue() . "\n");
                                            }
                                        } else if ($value[0] instanceof Comment) {
                                            $comments = $value;
                                            foreach ($comments as $comment) {
                                                echo ("Record Comment CommentedBy: " . $comment->getCommentedBy() . "\n");
                                                echo ("Record Comment CommentedTime: ");
                                                print_r($comment->getCommentedTime());
                                                echo ("\n");
                                                echo ("Record Comment CommentContent: " . $comment->getCommentContent() . "\n");
                                                echo ("Record Comment Id: " . $comment->getId() . "\n");
                                            }
                                        } else if ($value[0] instanceof Attachment) {
                                            $attachments = $value;
                                            foreach ($attachments as $attachment) {
                                                $owner = $attachment->getOwner();
                                                if ($owner != null) {
                                                    echo ("Record Attachment Owner User-Name: " . $owner->getName() . "\n");
                                                    echo ("Record Attachment Owner User-ID: " . $owner->getId() . "\n");
                                                    echo ("Record Attachment Owner User-Email: " . $owner->getEmail() . "\n");
                                                }
                                                echo ("Record Attachment Modified Time: ");
                                                print_r($attachment->getModifiedTime());
                                                echo ("\n");
                                                echo ("Record Attachment File Name: " . $attachment->getFileName() . "\n");
                                                echo ("Record Attachment Created Time: ");
                                                print_r($attachment->getCreatedTime());
                                                echo ("\n");
                                                echo ("Record Attachment File Size: " . $attachment->getSize() . "\n");
                                                $parentId = $attachment->getParentId();
                                                if ($parentId != null) {
                                                    echo ("Record Attachment parent record Name: " . $parentId->getName() . "\n");
                                                    echo ("Record Attachment parent record ID: " . $parentId->getId() . "\n");
                                                }
                                                echo ("Record Attachment is Editable: " . $attachment->getEditable() . "\n");
                                                echo ("Record Attachment File ID: " . $attachment->getFileId() . "\n");
                                                echo ("Record Attachment File Type: " . $attachment->getType() . "\n");
                                                echo ("Record Attachment seModule: " . $attachment->getSeModule() . "\n");
                                                $modifiedBy = $attachment->getModifiedBy();
                                                if ($modifiedBy != null) {
                                                    echo ("Record Attachment Modified By User-Name: " . $modifiedBy->getName() . "\n");
                                                    echo ("Record Attachment Modified By User-ID: " . $modifiedBy->getId() . "\n");
                                                    echo ("Record Attachment Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                                                }
                                                echo ("Record Attachment State: " . $attachment->getState() . "\n");
                                                echo ("Record Attachment ID: " . $attachment->getId() . "\n");
                                                $createdBy = $attachment->getCreatedBy();
                                                if ($createdBy != null) {
                                                    echo ("Record Attachment Created By User-Name: " . $createdBy->getName() . "\n");
                                                    echo ("Record Attachment Created By User-ID: " . $createdBy->getId() . "\n");
                                                    echo ("Record Attachment Created By User-Email: " . $createdBy->getEmail() . "\n");
                                                }
                                                echo ("Record Attachment LinkUrl: " . $attachment->getLinkUrl() . "\n");
                                            }
                                        } else if ($value[0] instanceof ImageUpload) {
                                            $imageUploads = $value;
                                            foreach ($imageUploads as $imageUpload) {
                                                echo ("RelatedRecord " . $keyName . " Description: " . $imageUpload->getDescriptionS() . "\n");
                                                echo ("RelatedRecord " . $keyName . " FileIds: " . $imageUpload->getFileIdS() . "\n");
                                                echo ("RelatedRecord " . $keyName . " FileNameS: " . $imageUpload->getFileNameS() . "\n");
                                                echo ("RelatedRecord " . $keyName . " PreviewIdS: " . $imageUpload->getPreviewIdS() . "\n");
                                                echo ("RelatedRecord " . $keyName . " SizeS: " . $imageUpload->getSizeS() . "\n");
                                                echo ("RelatedRecord " . $keyName . " States: " . $imageUpload->getStateS() . "\n");
                                                echo ("RelatedRecord " . $keyName . " ID: " . $imageUpload->getId() . "\n");
                                                echo ("RelatedRecord " . $keyName . " SequenceNumberS: " . $imageUpload->getSequenceNumberS() . "\n");
                                            }
                                        } else {
                                            echo ($keyName . " : ");
                                            print_r($value);
                                            echo ("\n");
                                        }
                                    } else if ($value instanceof Layouts) {
                                        $layout = $value;
                                        if ($layout != null) {
                                            echo ("Record " . $keyName . " ID: " . $layout->getId() . "\n");
                                            echo ("Record " . $keyName . " Name: " . $layout->getName() . "\n");
                                        }
                                    } else if ($value instanceof MinifiedUser) {
                                        $user = $value;
                                        if ($user != null) {
                                            echo ("Record " . $keyName . " User-ID: " . $user->getId() . "\n");
                                            echo ("Record " . $keyName . " User-Name: " . $user->getName() . "\n");
                                            echo ("Record " . $keyName . " User-Email: " . $user->getEmail() . "\n");
                                        }
                                    } else if ($value instanceof Record) {
                                        $recordValue = $value;
                                        echo ("Record " . $keyName . " ID: " . $recordValue->getId() . "\n");
                                        echo ("Record " . $keyName . " Name: " . $recordValue->getKeyValue("name") . "\n");
                                    } else if ($value instanceof Choice) {
                                        $choiceValue = $value;
                                        echo ("Record " . $keyName . " : " . $choiceValue->getValue() . "\n");
                                    } else if ($value instanceof RemindAt) {
                                        echo ($keyName . ": " . $value->getAlarm() . "\n");
                                    } else if ($value instanceof RecurringActivity) {
                                        echo ($keyName . " : RRULE" . ": " . $value->getRrule() . "\n");
                                    } else if ($value instanceof Consent) {
                                        $consent = $value;
                                        echo ("Record Consent ID: " . $consent->getId());
                                        $owner = $consent->getOwner();
                                        if ($owner != null) {
                                            echo ("Record Consent Owner Name: " . $owner->getName());
                                            echo ("Record Consent Owner ID: " . $owner->getId());
                                            echo ("Record Consent Owner Email: " . $owner->getEmail());
                                        }
                                        $consentCreatedBy = $consent->getCreatedBy();
                                        if ($consentCreatedBy != null) {
                                            echo ("Record Consent CreatedBy Name: " . $consentCreatedBy->getName());
                                            echo ("Record Consent CreatedBy ID: " . $consentCreatedBy->getId());
                                            echo ("Record Consent CreatedBy Email: " . $consentCreatedBy->getEmail());
                                        }
                                        $consentModifiedBy = $consent->getModifiedBy();
                                        if ($consentModifiedBy != null) {
                                            echo ("Record Consent ModifiedBy Name: " . $consentModifiedBy->getName());
                                            echo ("Record Consent ModifiedBy ID: " . $consentModifiedBy->getId());
                                            echo ("Record Consent ModifiedBy Email: " . $consentModifiedBy->getEmail());
                                        }
                                        echo ("Record Consent CreatedTime: " . date_format($consent->getCreatedTime(), 'd-m-y-H-i-s') . "\n");
                                        echo ("Record Consent ModifiedTime: " . date_format($consent->getModifiedTime(), 'd-m-y-H-i-s') . "\n");
                                        echo ("Record Consent ContactThroughEmail: " . $consent->getContactThroughEmail());
                                        echo ("Record Consent ContactThroughSocial: " . $consent->getContactThroughSocial());
                                        echo ("Record Consent ContactThroughSurvey: " . $consent->getContactThroughSurvey());
                                        echo ("Record Consent ContactThroughPhone: " . $consent->getContactThroughPhone());
                                        echo ("Record Consent MailSentTime: " . date_format($consent->getMailSentTime(), 'd-m-y-H-i-s') . "\n");
                                        echo ("Record Consent ConsentDate: " . date_format($consent->getConsentDate(), 'd-m-y-H-i-s') . "\n");
                                        echo ("Record Consent ConsentRemarks: " . $consent->getConsentRemarks());
                                        echo ("Record Consent ConsentThrough: " . $consent->getConsentThrough());
                                        echo ("Record Consent DataProcessingBasis: " . $consent->getDataProcessingBasis());
                                        //To get custom values
                                        echo ("Record Consent Lawful Reason: " . $consent->getKeyValue("Lawful_Reason"));
                                    } else {
                                        echo ($keyName . " : ");
                                        print_r($value);
                                        echo ("\n");
                                    }
                                } else {
                                    echo ($keyName . " : ");
                                    print_r($value);
                                    echo ("\n");
                                }
                            }
                        }
                    }
                } else if ($responseHandler instanceof FileBodyWrapper) {
                    $fileBodyWrapper = $responseHandler;
                    $streamWrapper = $fileBodyWrapper->getFile();
                    //Create a file instance with the absolute_file_path
                    $fp = fopen($destinationFolder . "/" . $streamWrapper->getName(), "w");
                    $stream = $streamWrapper->getStream();
                    fputs($fp, $stream);
                    fclose($fp);
                } else if ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                    echo ("Code: " . $exception->getCode()->getValue() . "\n");
                    echo ("Details: ");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo ($key . " : " . $value . "\n");
                    }
                    echo ("Message : " . ($exception->getMessage() instanceof Choice ? $exception->getMessage()->getValue() : $exception->getMessage()) . "\n");
                }
            } else {
                print_r($response);
            }
        }
    }
}
$moduleAPIName = "leads";
$externalFieldValue = "External99";
$destinationfolder = "users/user_name/documents";
GetRecordUsingExternalId::initialize();
GetRecordUsingExternalId::getRecordUsingExternalId($moduleAPIName, $externalFieldValue, $destinationfolder);
