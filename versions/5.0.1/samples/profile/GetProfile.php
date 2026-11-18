<?php
namespace samples\profile;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\profiles\APIException;
use com\zoho\crm\api\profiles\ProfilesOperations;
use com\zoho\crm\api\profiles\ResponseWrapper;

require_once "vendor/autoload.php";

class GetProfile
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

    public static function getProfile(string $profileId)
    {
        $profilesOperations = new ProfilesOperations();
        $response = $profilesOperations->getProfile($profileId);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $profiles = $responseWrapper->getProfiles();
                
                foreach ($profiles as $profile) {
                    echo("Profile DisplayLabel: " . $profile->getDisplayLabel() . "\n");
                    
                    if ($profile->getCreatedTime() != null) {
                        echo("Profile CreatedTime: ");
                        print_r($profile->getCreatedTime());
                        echo("\n");
                    }
                    
                    if ($profile->getModifiedTime() != null) {
                        echo("Profile ModifiedTime: ");
                        print_r($profile->getModifiedTime());
                        echo("\n");
                    }
                    
                    $permissionsDetails = $profile->getPermissionsDetails();
                    if ($permissionsDetails != null) {
                        foreach ($permissionsDetails as $permissionsDetail) {
                            echo("Profile PermissionDetail DisplayLabel: " . $permissionsDetail->getDisplayLabel() . "\n");
                            echo("Profile PermissionDetail Module: " . $permissionsDetail->getModule() . "\n");
                            echo("Profile PermissionDetail Name: " . $permissionsDetail->getName() . "\n");
                            echo("Profile PermissionDetail ID: " . $permissionsDetail->getId() . "\n");
                            echo("Profile PermissionDetail Enabled: " . $permissionsDetail->getEnabled() . "\n");
                        }
                    }
                    
                    echo("Profile Name: " . $profile->getName() . "\n");
                    
                    $modifiedBy = $profile->getModifiedBy();
                    if ($modifiedBy != null) {
                        echo("Profile Modified By User-ID: " . $modifiedBy->getId() . "\n");
                        echo("Profile Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        echo("Profile Modified By User-Email: " . $modifiedBy->getEmail() . "\n");
                    }
                    
                    echo("Profile Description: " . $profile->getDescription() . "\n");
                    echo("Profile ID: " . $profile->getId() . "\n");
                    echo("Profile Category: " . $profile->getCategory() . "\n");
                    
                    $createdBy = $profile->getCreatedBy();
                    if ($createdBy != null) {
                        echo("Profile Created By User-ID: " . $createdBy->getId() . "\n");
                        echo("Profile Created By User-Name: " . $createdBy->getName() . "\n");
                        echo("Profile Created By User-Email: " . $createdBy->getEmail() . "\n");
                    }
                    
                    $sections = $profile->getSections();
                    if ($sections != null) {
                        foreach ($sections as $section) {
                            echo("Profile Section Name: " . $section->getName() . "\n");
                            
                            $categories = $section->getCategories();
                            foreach ($categories as $category) {
                                echo("Profile Section Category DisplayLabel: " . $category->getDisplayLabel() . "\n");
                                
                                $categoryPermissionsDetails = $category->getPermissionsDetails();
                                if ($categoryPermissionsDetails != null) {
                                    foreach ($categoryPermissionsDetails as $permissionsDetailID) {
                                        echo("Profile Section Category permissionsDetailID: " . $permissionsDetailID . "\n");
                                    }
                                }
                                
                                echo("Profile Section Category Name: " . $category->getName() . "\n");
                            }
                        }
                    }
                    
                    if ($profile->getDelete() != null) {
                        echo("Profile Delete: " . $profile->getDelete() . "\n");
                    }
                    
                    if ($profile->getDefault() != null) {
                        echo("Profile Default: " . $profile->getDefault() . "\n");
                    }
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo($key . ": " . $value . "\n");
                    }
                }
                
                echo("Message: " . $exception->getMessage() . "\n");
            }
        }
    }
}

GetProfile::initialize();
GetProfile::getProfile("1055806000024277005");