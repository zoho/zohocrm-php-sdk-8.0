<?php
namespace samples\currencies;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\currencies\CurrenciesOperations;
use com\zoho\crm\api\currencies\BodyWrapper;
use com\zoho\crm\api\currencies\Currency;
use com\zoho\crm\api\currencies\Format;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\currencies\ActionWrapper;
use com\zoho\crm\api\currencies\SuccessResponse;
use com\zoho\crm\api\currencies\APIException;

require_once "vendor/autoload.php";

class AddCurrencies
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

    public static function addCurrencies()
    {
        $currenciesOperations = new CurrenciesOperations();
        
        $bodyWrapper = new BodyWrapper();
        $currencies = array();
        
        $currency = new Currency();
        $currency->setPrefixSymbol(true);
        $currency->setName("Algerian Dinar - DZD");
        $currency->setIsoCode("DZD");
        $currency->setSymbol("DA");
        $currency->setExchangeRate("20.0000");
        $currency->setIsActive(true);
        
        $format = new Format();
        $format->setDecimalSeparator(new Choice("Period"));
        $format->setThousandSeparator(new Choice("Comma"));
        $format->setDecimalPlaces(new Choice("2"));
        
        $currency->setFormat($format);
        array_push($currencies, $currency);
        
        $bodyWrapper->setCurrencies($currencies);
        
        $response = $currenciesOperations->addCurrencies($bodyWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $actionHandler = $response->getObject();
            
            if ($actionHandler instanceof ActionWrapper) {
                $actionWrapper = $actionHandler;
                $actionResponses = $actionWrapper->getCurrencies();
                
                foreach ($actionResponses as $actionResponse) {
                    if ($actionResponse instanceof SuccessResponse) {
                        $successResponse = $actionResponse;
                        echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                        echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                        echo("Message: " . $successResponse->getMessage() . "\n");
                        
                        if ($successResponse->getDetails() != null) {
                            echo("Details: ");
                            foreach ($successResponse->getDetails() as $keyName => $keyValue) {
                                echo($keyName . " : ");
                                print_r($keyValue);
                                echo("\n");
                            }
                        }
                    } else if ($actionResponse instanceof APIException) {
                        $exception = $actionResponse;
                        echo("Status: " . $exception->getStatus()->getValue() . "\n");
                        echo("Code: " . $exception->getCode()->getValue() . "\n");
                        echo("Message: " . $exception->getMessage()->getValue() . "\n");
                        
                        if ($exception->getDetails() != null) {
                            echo("Details: ");
                            foreach ($exception->getDetails() as $keyName => $keyValue) {
                                echo($keyName . " : " . $keyValue . "\n");
                            }
                        }
                    }
                }
            } else if ($actionHandler instanceof APIException) {
                $exception = $actionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue) {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
            }
        }
    }
}

AddCurrencies::initialize();
AddCurrencies::addCurrencies();
?>
