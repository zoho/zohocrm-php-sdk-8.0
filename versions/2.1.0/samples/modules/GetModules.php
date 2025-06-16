<?php
namespace samples\modules;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\HeaderMap;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\modules\APIException;
use com\zoho\crm\api\modules\ModulesOperations;
use com\zoho\crm\api\modules\ResponseWrapper;
use com\zoho\crm\api\modules\GetModulesHeader;
use com\zoho\crm\api\modules\GetModulesParam;
use com\zoho\crm\api\util\Choice;

require_once "vendor/autoload.php";

class GetModules
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

    public static function getModules()
    {
        $moduleOperations = new ModulesOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetModulesParam::status(), new Choice("user_hidden"));//user_hidden,system_hidden,scheduled_for_deletion,visible
        $headerInstance = new HeaderMap();
        $datetime = date_create("2022-12-15T17:58:47+05:30")->setTimezone(new \DateTimeZone(date_default_timezone_get()));
        $headerInstance->add(GetModulesHeader::IfModifiedSince(), $datetime);
        //Call getModules method that takes headerInstance as parameters
        $response = $moduleOperations->getModules($paramInstance, $headerInstance);
        if ($response != null) {
            echo ("Status code " . $response->getStatusCode() . "\n");
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo ($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            $responseHandler = $response->getObject();
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $modules = $responseWrapper->getModules();
                foreach ($modules as $module) {
                    echo ("Module GlobalSearchSupported: ");
                    print_r($module->getGlobalSearchSupported());
                    echo ("\n");
                    echo ("Module Deletable: ");
                    print_r($module->getDeletable());
                    echo ("\n");
                    echo ("Module Description: " . $module->getDescription() . "\n");
                    echo ("Module Creatable: ");
                    print_r($module->getCreatable());
                    echo ("\n");
                    echo ("Module InventoryTemplateSupported: ");
                    print_r($module->getInventoryTemplateSupported());
                    echo ("\n");
                    echo ("Module ModifiedTime: ");
                    print_r($module->getModifiedTime());
                    echo ("\n");
                    echo ("Module PluralLabel: " . $module->getPluralLabel() . "\n");
                    echo ("Module PresenceSubMenu: ");
                    print_r($module->getPresenceSubMenu());
                    echo ("\n");
                    echo ("Module TriggersSupported: ");
                    print_r($module->getTriggersSupported());
                    echo ("\n");
                    echo ("Module Id: " . $module->getId() . "\n");
                    echo ("Module IsBlueprintSupported: ");
                    print_r($module->getIsblueprintsupported());
                    echo ("\n");
                    echo ("Module Visible: ");
                    print_r($module->getVisible());
                    echo ("\n");
                    echo ("Module Visibility: " . $module->getVisibility() . "\n");
                    echo ("Module Convertable: ");
                    print_r($module->getConvertable());
                    echo ("\n");
                    echo ("Module Editable: ");
                    print_r($module->getEditable());
                    echo ("\n");
                    echo ("Module EmailtemplateSupport: ");
                    print_r($module->getEmailtemplateSupport());
                    echo ("\n");
                    $profiles = $module->getProfiles();
                    if ($profiles != null) {
                        foreach ($profiles as $profile) {
                            echo ("Module Profile Name: " . $profile->getName() . "\n");
                            echo ("Module Profile Id: " . $profile->getId() . "\n");
                        }
                    }
                    echo ("Module FilterSupported: ");
                    print_r($module->getFilterSupported());
                    echo ("\n");
                    echo ("Module ShowAsTab: ");
                    print_r($module->getShowAsTab());
                    echo ("\n");
                    echo ("Module WebLink: " . $module->getWebLink() . "\n");
                    echo ("Module SequenceNumber: " . $module->getSequenceNumber() . "\n");
                    echo ("Module SingularLabel: " . $module->getSingularLabel() . "\n");
                    echo ("Module Viewable: ");
                    print_r($module->getViewable());
                    echo ("\n");
                    echo ("Module APISupported: ");
                    print_r($module->getAPISupported());
                    echo ("\n");
                    echo ("Module APIName: " . $module->getAPIName() . "\n");
                    echo ("Module QuickCreate: ");
                    print_r($module->getQuickCreate());
                    echo ("\n");
                    $modifiedBy = $module->getModifiedBy();
                    if ($modifiedBy != null) {
                        echo ("Module Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        echo ("Module Modified By User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    echo ("Module GeneratedType: " . $module->getGeneratedType()->getValue() . "\n");
                    echo ("Module FeedsRequired: ");
                    print_r($module->getFeedsRequired());
                    echo ("\n");
                    echo ("Module ScoringSupported: ");
                    print_r($module->getScoringSupported());
                    echo ("\n");
                    echo ("Module WebformSupported: ");
                    print_r($module->getWebformSupported());
                    echo ("\n");
                    $arguments = $module->getArguments();
                    if ($arguments != null) {
                        foreach ($arguments as $argument) {
                            echo ("Module Argument Name: " . $argument->getName() . "\n");
                            echo ("Module Argument Value: " . $argument->getValue() . "\n");
                        }
                    }
                    echo ("Module ModuleName: " . $module->getModuleName() . "\n");
                    echo ("Module BusinessCardFieldLimit: " . $module->getBusinessCardFieldLimit() . "\n");
                    $parentModule = $module->getParentModule();
                    if ($parentModule != null && $parentModule->getAPIName() != null) {
                        echo ("Module Parent Module Name: " . $parentModule->getAPIName() . "\n");
                        echo ("Module Parent Module Id: " . $parentModule->getId() . "\n");
                    }
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo ("Status: " . $exception->getStatus()->getValue() . "\n");
                echo ("Code: " . $exception->getCode()->getValue() . "\n");
                echo ("Details: ");
                foreach ($exception->getDetails() as $key => $value) {
                    echo ($key . ": " . $value . "\n");
                }
                echo ("Message : " . $exception->getMessage());
            }
        }
    }
}

GetModules::initialize();
GetModules::getModules();