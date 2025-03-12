<?php
namespace samples\ziaorgenrichment;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ziaorgenrichment\ZiaOrgEnrichmentOperations;
use com\zoho\crm\api\ziaorgenrichment\ResponseWrapper;
use com\zoho\crm\api\ziaorgenrichment\APIException;

class GetZiaOrgEnrichment
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

    public static function getZiaOrgEnrichment($ziaOrgEnrichmentId)
    {
        $ziaOrgEnrichmentOperations = new ZiaOrgEnrichmentOperations();
        $response = $ziaOrgEnrichmentOperations->getZiaOrgEnrichment($ziaOrgEnrichmentId);

        if ($response != null) {
            echo "Status Code: " . $response->getStatusCode() . PHP_EOL;

            if ($response->getStatusCode() == 204) {
                echo "No Content" . PHP_EOL;
                return;
            }

            if ($response->isExpected()) {
                $responseHandler = $response->getObject();

                if ($responseHandler instanceof ResponseWrapper) {
                    $responseWrapper = $responseHandler;
                    $ziaOrgEnrichments = $responseWrapper->getZiaOrgEnrichment();

                    if ($ziaOrgEnrichments != null) {
                        foreach ($ziaOrgEnrichments as $ziaOrgEnrichment) {
                            $enrichedData = $ziaOrgEnrichment->getEnrichedData();

                            if ($enrichedData != null) {
                                echo "OrgStatus: " . $enrichedData->getOrgStatus() . PHP_EOL;

                                $descriptions = $enrichedData->getDescription();
                                if ($descriptions != null) {
                                    foreach ($descriptions as $description) {
                                        echo "Title: " . $description->getTitle() . PHP_EOL;
                                        echo "Description: " . $description->getDescription() . PHP_EOL;
                                    }
                                }

                                echo "CEO: " . $enrichedData->getCeo() . PHP_EOL;
                                echo "SecondaryEmail: " . $enrichedData->getSecondaryEmail() . PHP_EOL;
                                echo "Revenue: " . $enrichedData->getRevenue() . PHP_EOL;
                                echo "YearsInIndustry: " . $enrichedData->getYearsInIndustry() . PHP_EOL;

                                $otherContacts = $enrichedData->getOtherContacts();
                                if ($otherContacts != null) {
                                    foreach ($otherContacts as $otherContact) {
                                        echo "OtherContact: " . $otherContact . PHP_EOL;
                                    }
                                }

                                echo "TechnoGraphicData: " . $enrichedData->getTechnoGraphicData() . PHP_EOL;
                                echo "Logo: " . $enrichedData->getLogo() . PHP_EOL;
                                echo "SecondaryContact: " . $enrichedData->getSecondaryContact() . PHP_EOL;
                                echo "Id: " . $enrichedData->getId() . PHP_EOL;

                                $otherEmails = $enrichedData->getOtherEmails();
                                if ($otherEmails != null) {
                                    foreach ($otherEmails as $otherEmail) {
                                        echo "OtherEmail: " . $otherEmail . PHP_EOL;
                                    }
                                }

                                echo "SignIn: " . $enrichedData->getSignIn() . PHP_EOL;
                                echo "Website: " . $enrichedData->getWebsite() . PHP_EOL;

                                $addresses = $enrichedData->getAddress();
                                if ($addresses != null) {
                                    foreach ($addresses as $address) {
                                        echo "Country: " . $address->getCountry() . PHP_EOL;
                                        echo "City: " . $address->getCity() . PHP_EOL;
                                        echo "PinCode: " . $address->getPinCode() . PHP_EOL;
                                        echo "State: " . $address->getState() . PHP_EOL;
                                        echo "FillAddress: " . $address->getFillAddress() . PHP_EOL;
                                    }
                                }

                                echo "SignUp: " . $enrichedData->getSignUp() . PHP_EOL;
                                echo "OrgType: " . $enrichedData->getOrgType() . PHP_EOL;

                                $headQuarters = $enrichedData->getHeadQuarters();
                                if ($headQuarters != null) {
                                    foreach ($headQuarters as $headQuarter) {
                                        echo "HQ Country: " . $headQuarter->getCountry() . PHP_EOL;
                                        echo "HQ City: " . $headQuarter->getCity() . PHP_EOL;
                                        echo "HQ PinCode: " . $headQuarter->getPinCode() . PHP_EOL;
                                        echo "HQ State: " . $headQuarter->getState() . PHP_EOL;
                                        echo "HQ FillAddress: " . $headQuarter->getFillAddress() . PHP_EOL;
                                    }
                                }

                                echo "NoOfEmployees: " . $enrichedData->getNoOfEmployees() . PHP_EOL;

                                $territoryList = $enrichedData->getTerritoryList();
                                if ($territoryList != null) {
                                    foreach ($territoryList as $territory) {
                                        echo "Territory: " . $territory . PHP_EOL;
                                    }
                                }

                                echo "FoundingYear: " . $enrichedData->getFoundingYear() . PHP_EOL;

                                $industries = $enrichedData->getIndustries();
                                if ($industries != null) {
                                    foreach ($industries as $industry) {
                                        echo "Industry Name: " . $industry->getName() . PHP_EOL;
                                        echo "Industry Description: " . $industry->getDescription() . PHP_EOL;
                                    }
                                }

                                echo "Name: " . $enrichedData->getName() . PHP_EOL;
                                echo "PrimaryEmail: " . $enrichedData->getPrimaryEmail() . PHP_EOL;

                                $businessModel = $enrichedData->getBusinessModel();
                                if ($businessModel != null) {
                                    foreach ($businessModel as $model) {
                                        echo "BusinessModel: " . $model . PHP_EOL;
                                    }
                                }

                                echo "PrimaryContact: " . $enrichedData->getPrimaryContact() . PHP_EOL;

                                $socialMedia = $enrichedData->getSocialMedia();
                                if ($socialMedia != null) {
                                    foreach ($socialMedia as $media) {
                                        echo "SocialMedia Type: " . $media->getMediaType() . PHP_EOL;

                                        $mediaUrls = $media->getMediaUrl();
                                        if ($mediaUrls != null) {
                                            foreach ($mediaUrls as $mediaUrl) {
                                                echo "SocialMedia URL: " . $mediaUrl . PHP_EOL;
                                            }
                                        }
                                    }
                                }
                            }

                            $enrichBasedOn = $ziaOrgEnrichment->getEnrichBasedOn();
                            if ($enrichBasedOn != null) {
                                echo "EnrichBasedOn Name: " . $enrichBasedOn->getName() . PHP_EOL;
                                echo "EnrichBasedOn Email: " . $enrichBasedOn->getEmail() . PHP_EOL;
                                echo "EnrichBasedOn Website: " . $enrichBasedOn->getWebsite() . PHP_EOL;
                            }

                            echo "Id: " . $ziaOrgEnrichment->getId() . PHP_EOL;
                            echo "Status: " . $ziaOrgEnrichment->getStatus() . PHP_EOL;
                        }
                    }
                } elseif ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
                    echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
                    echo "Details: " . PHP_EOL;
                    foreach ($exception->getDetails() as $key => $value) {
                        echo $key . ": " . $value . PHP_EOL;
                    }
                    echo "Message: " . $exception->getMessage() . PHP_EOL;
                }
            }
        }
    }
}

GetZiaOrgEnrichment::initialize();
$ziaOrgEnrichmentId = 72722561001;
GetZiaOrgEnrichment::getZiaOrgEnrichment($ziaOrgEnrichmentId);