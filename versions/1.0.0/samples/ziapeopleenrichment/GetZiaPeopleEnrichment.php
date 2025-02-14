<?php
namespace samples\ziapeopleenrichment;

require_once "vendor/autoload.php";

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ziapeopleenrichment\ZiaPeopleEnrichmentOperations;
use com\zoho\crm\api\ziapeopleenrichment\ResponseWrapper;
use com\zoho\crm\api\ziapeopleenrichment\APIException;

class GetZiaPeopleEnrichment
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

    public static function getZiaPeopleEnrichment($ziaPeopleEnrichmentId)
    {
        $ziaPeopleEnrichmentOperations = new ZiaPeopleEnrichmentOperations();
        $response = $ziaPeopleEnrichmentOperations->getZiaPeopleEnrichment($ziaPeopleEnrichmentId);

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
                    $ziaPeopleEnrichments = $responseWrapper->getZiaPeopleEnrichment();

                    if ($ziaPeopleEnrichments != null) {
                        foreach ($ziaPeopleEnrichments as $ziaPeopleEnrichment) {
                            $enrichedData = $ziaPeopleEnrichment->getEnrichedData();
                            if ($enrichedData != null) {
                                echo "ZiaPeopleEnrichment EnrichedData Website: " . $enrichedData->getWebsite() . PHP_EOL;

                                $emailInfos = $enrichedData->getEmailInfos();
                                if ($emailInfos != null) {
                                    foreach ($emailInfos as $emailInfo) {
                                        echo "ZiaPeopleEnrichment EnrichedData EmailInfo Type: " . $emailInfo->getType() . PHP_EOL;
                                        echo "ZiaPeopleEnrichment EnrichedData EmailInfo Email: " . $emailInfo->getEmail() . PHP_EOL;
                                    }
                                }

                                echo "ZiaPeopleEnrichment EnrichedData Gender: " . $enrichedData->getGender() . PHP_EOL;

                                $companyInfo = $enrichedData->getCompanyInfo();
                                if ($companyInfo != null) {
                                    echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Name: " . $companyInfo->getName() . PHP_EOL;

                                    $industries = $companyInfo->getIndustries();
                                    if ($industries != null) {
                                        foreach ($industries as $industry) {
                                            echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Industries Name: " . $industry->getName() . PHP_EOL;
                                            echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Industries Description: " . $industry->getDescription() . PHP_EOL;
                                        }
                                    }

                                    $experiences = $companyInfo->getExperiences();
                                    if ($experiences != null) {
                                        foreach ($experiences as $experience) {
                                            echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Experience EndDate: " . $experience->getEndDate() . PHP_EOL;
                                            echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Experience CompanyName: " . $experience->getCompanyName() . PHP_EOL;
                                            echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Experience Title: " . $experience->getTitle() . PHP_EOL;
                                            echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Experience StartDate: " . $experience->getStartDate() . PHP_EOL;
                                            echo "ZiaPeopleEnrichment EnrichedData CompanyInfo Experience Primary: " . $experience->getPrimary() . PHP_EOL;
                                        }
                                    }
                                }

                                echo "ZiaPeopleEnrichment EnrichedData LastName: " . $enrichedData->getLastName() . PHP_EOL;

                                $educations = $enrichedData->getEducations();
                                if ($educations != null) {
                                    echo "ZiaPeopleEnrichment EnrichedData Educations: " . PHP_EOL;
                                    print_r($educations);
                                }

                                echo "ZiaPeopleEnrichment EnrichedData MiddleName: " . $enrichedData->getMiddleName() . PHP_EOL;

                                $skills = $enrichedData->getSkills();
                                if ($skills != null) {
                                    echo "ZiaPeopleEnrichment EnrichedData Skills: " . PHP_EOL;
                                    print_r($skills);
                                }

                                $otherContacts = $enrichedData->getOtherContacts();
                                if ($otherContacts != null) {
                                    foreach ($otherContacts as $otherContact) {
                                        echo "ZiaPeopleEnrichment EnrichedData OtherContacts: " . $otherContact . PHP_EOL;
                                    }
                                }

                                $addressListInfo = $enrichedData->getAddressListInfo();
                                if ($addressListInfo != null) {
                                    foreach ($addressListInfo as $addressList) {
                                        echo "ZiaPeopleEnrichment EnrichedData AddressListInfo Continent: " . $addressList->getContinent() . PHP_EOL;
                                        echo "ZiaPeopleEnrichment EnrichedData AddressListInfo Country: " . $addressList->getCountry() . PHP_EOL;
                                        echo "ZiaPeopleEnrichment EnrichedData AddressListInfo Name: " . $addressList->getName() . PHP_EOL;
                                        echo "ZiaPeopleEnrichment EnrichedData AddressListInfo Region: " . $addressList->getRegion() . PHP_EOL;
                                        echo "ZiaPeopleEnrichment EnrichedData AddressListInfo Primary: " . $addressList->getPrimary() . PHP_EOL;
                                    }
                                }

                                $primaryAddressInfo = $enrichedData->getPrimaryAddressInfo();
                                if ($primaryAddressInfo != null) {
                                    echo "ZiaPeopleEnrichment EnrichedData PrimaryAddressInfo Continent: " . $primaryAddressInfo->getContinent() . PHP_EOL;
                                    echo "ZiaPeopleEnrichment EnrichedData PrimaryAddressInfo Country: " . $primaryAddressInfo->getCountry() . PHP_EOL;
                                    echo "ZiaPeopleEnrichment EnrichedData PrimaryAddressInfo Name: " . $primaryAddressInfo->getName() . PHP_EOL;
                                    echo "ZiaPeopleEnrichment EnrichedData PrimaryAddressInfo Region: " . $primaryAddressInfo->getRegion() . PHP_EOL;
                                    echo "ZiaPeopleEnrichment EnrichedData PrimaryAddressInfo Primary: " . $primaryAddressInfo->getPrimary() . PHP_EOL;
                                }

                                echo "ZiaPeopleEnrichment EnrichedData Name: " . $enrichedData->getName() . PHP_EOL;
                                echo "ZiaPeopleEnrichment EnrichedData SecondaryContact: " . $enrichedData->getSecondaryContact() . PHP_EOL;
                                echo "ZiaPeopleEnrichment EnrichedData PrimaryEmail: " . $enrichedData->getPrimaryEmail() . PHP_EOL;
                                echo "ZiaPeopleEnrichment EnrichedData Designation: " . $enrichedData->getDesignation() . PHP_EOL;
                                echo "ZiaPeopleEnrichment EnrichedData Id: " . $enrichedData->getId() . PHP_EOL;

                                $interests = $enrichedData->getInterests();
                                if ($interests != null) {
                                    echo "ZiaPeopleEnrichment EnrichedData Interests: " . PHP_EOL;
                                    print_r($interests);
                                }

                                echo "ZiaPeopleEnrichment EnrichedData FirstName: " . $enrichedData->getFirstName() . PHP_EOL;
                                echo "ZiaPeopleEnrichment EnrichedData PrimaryContact: " . $enrichedData->getPrimaryContact() . PHP_EOL;

                                $socialMedia = $enrichedData->getSocialMedia();
                                if ($socialMedia != null) {
                                    foreach ($socialMedia as $social) {
                                        echo "ZiaPeopleEnrichment EnrichedData SocialMedia MediaType: " . $social->getMediaType() . PHP_EOL;
                                        $mediaUrls = $social->getMediaUrl();
                                        if ($mediaUrls != null) {
                                            foreach ($mediaUrls as $mediaUrl) {
                                                echo "ZiaPeopleEnrichment EnrichedData SocialMedia MediaUrl: " . $mediaUrl . PHP_EOL;
                                            }
                                        }
                                    }
                                }
                            }

                            $enrichBasedOn = $ziaPeopleEnrichment->getEnrichBasedOn();
                            if ($enrichBasedOn != null) {
                                $social = $enrichBasedOn->getSocial();
                                if ($social != null) {
                                    echo "ZiaPeopleEnrichment EnrichBasedOn Social Facebook: " . $social->getFacebook() . PHP_EOL;
                                    echo "ZiaPeopleEnrichment EnrichBasedOn Social Linkedin: " . $social->getLinkedin() . PHP_EOL;
                                    echo "ZiaPeopleEnrichment EnrichBasedOn Social Twitter: " . $social->getTwitter() . PHP_EOL;
                                }

                                echo "ZiaPeopleEnrichment EnrichBasedOn Name: " . $enrichBasedOn->getName() . PHP_EOL;

                                $company = $enrichBasedOn->getCompany();
                                if ($company != null) {
                                    echo "ZiaPeopleEnrichment EnrichBasedOn Company Website: " . $company->getWebsite() . PHP_EOL;
                                    echo "ZiaPeopleEnrichment EnrichBasedOn Company Name: " . $company->getName() . PHP_EOL;
                                }

                                echo "ZiaPeopleEnrichment EnrichBasedOn Email: " . $enrichBasedOn->getEmail() . PHP_EOL;
                            }

                            echo "ZiaPeopleEnrichment Id: " . $ziaPeopleEnrichment->getId() . PHP_EOL;
                            echo "ZiaPeopleEnrichment Status: " . $ziaPeopleEnrichment->getStatus() . PHP_EOL;
                        }
                    }
                } elseif ($responseHandler instanceof APIException) {
                    $exception = $responseHandler;
                    echo "Status: " . $exception->getStatus()->getValue() . PHP_EOL;
                    echo "Code: " . $exception->getCode()->getValue() . PHP_EOL;
                    echo "Details: " . PHP_EOL;

                    if ($exception->getDetails() != null) {
                        foreach ($exception->getDetails() as $key => $value) {
                            echo $key . ": " . $value . PHP_EOL;
                        }
                    }

                    echo "Message: " . $exception->getMessage() . PHP_EOL;
                }
            }
        }
    }
}

GetZiaPeopleEnrichment::initialize();
$ziaPeopleEnrichmentId = 7272250563001;
GetZiaPeopleEnrichment::getZiaPeopleEnrichment($ziaPeopleEnrichmentId)

    ?>