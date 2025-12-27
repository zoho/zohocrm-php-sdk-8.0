<?php
namespace samples\currencies;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\currencies\CurrenciesOperations;
use com\zoho\crm\api\currencies\BaseCurrencyWrapper;
use com\zoho\crm\api\currencies\BaseCurrency;
use com\zoho\crm\api\currencies\Format;
use com\zoho\crm\api\util\Choice;
use com\zoho\crm\api\currencies\BaseCurrencyActionWrapper;
use com\zoho\crm\api\currencies\SuccessResponse;
use com\zoho\crm\api\currencies\APIException;

require_once "vendor/autoload.php";

class EnableBaseCurrency
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

    public static function enableBaseCurrency()
    {
        $currenciesOperations = new CurrenciesOperations();
        
        $bodyWrapper = new BaseCurrencyWrapper();
        
        $currency = new BaseCurrency();
        $currency->setPrefixSymbol(true);
        $currency->setName("Angolan Kwanza - AOA");
        $currency->setIsoCode("AOA");
        $currency->setSymbol("Kz");
        $currency->setExchangeRate("1.00");
        
        $format = new Format();
        $format->setDecimalSeparator(new Choice("Period"));
        $format->setThousandSeparator(new Choice("Comma"));
        $format->setDecimalPlaces(new Choice("2"));
        
        $currency->setFormat($format);
        $bodyWrapper->setBaseCurrency($currency);
        
        $response = $currenciesOperations->enableBaseCurrency($bodyWrapper);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            $baseCurrencyActionHandler = $response->getObject();
            
            if ($baseCurrencyActionHandler instanceof BaseCurrencyActionWrapper) {
                $baseCurrencyActionWrapper = $baseCurrencyActionHandler;
                $actionResponse = $baseCurrencyActionWrapper->getBaseCurrency();
                
                if ($actionResponse instanceof SuccessResponse) {
                    $successResponse = $actionResponse;
                    echo("Status: " . $successResponse->getStatus()->getValue() . "\n");
                    echo("Code: " . $successResponse->getCode()->getValue() . "\n");
                    echo("Message: " . $successResponse->getMessage()->getValue() . "\n");
                    
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
            } else if ($baseCurrencyActionHandler instanceof APIException) {
                $exception = $baseCurrencyActionHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
                
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

EnableBaseCurrency::initialize();
EnableBaseCurrency::enableBaseCurrency();
?>
