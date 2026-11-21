<?php
namespace samples\currencies;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\USDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\currencies\CurrenciesOperations;
use com\zoho\crm\api\currencies\ResponseWrapper;
use com\zoho\crm\api\currencies\APIException;

require_once "vendor/autoload.php";

class GetCurrency
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

    public static function getCurrency(string $currencyId)
    {
        $currenciesOperations = new CurrenciesOperations();
        
        $response = $currenciesOperations->getCurrency($currencyId);
        
        if ($response != null) {
            echo("Status Code: " . $response->getStatusCode() . "\n");
            
            if (in_array($response->getStatusCode(), array(204, 304))) {
                echo($response->getStatusCode() == 204 ? "No Content\n" : "Not Modified\n");
                return;
            }
            
            $responseHandler = $response->getObject();
            
            if ($responseHandler instanceof ResponseWrapper) {
                $responseWrapper = $responseHandler;
                $currenciesList = $responseWrapper->getCurrencies();
                
                foreach ($currenciesList as $currency) {
                    echo("Currency Symbol: " . $currency->getSymbol() . "\n");
                    echo("Currency CreatedTime: ");
                    print_r($currency->getCreatedTime());
                    echo("\n");
                    echo("Currency IsActive: " . $currency->getIsActive() . "\n");
                    echo("Currency ExchangeRate: " . $currency->getExchangeRate() . "\n");
                    
                    $format = $currency->getFormat();
                    if ($format != null) {
                        echo("Currency Format DecimalSeparator: " . $format->getDecimalSeparator()->getValue() . "\n");
                        echo("Currency Format ThousandSeparator: " . $format->getThousandSeparator()->getValue() . "\n");
                        echo("Currency Format DecimalPlaces: " . $format->getDecimalPlaces()->getValue() . "\n");
                    }
                    
                    $createdBy = $currency->getCreatedBy();
                    if ($createdBy != null) {
                        echo("Currency Created By User-ID: " . $createdBy->getId() . "\n");
                        echo("Currency Created By User-Name: " . $createdBy->getName() . "\n");
                    }
                    
                    echo("Currency PrefixSymbol: " . $currency->getPrefixSymbol() . "\n");
                    echo("Currency IsBase: " . $currency->getIsBase() . "\n");
                    echo("Currency ModifiedTime: ");
                    print_r($currency->getModifiedTime());
                    echo("\n");
                    echo("Currency Name: " . $currency->getName() . "\n");
                    
                    $modifiedBy = $currency->getModifiedBy();
                    if ($modifiedBy != null) {
                        echo("Currency Modified By User-ID: " . $modifiedBy->getId() . "\n");
                        echo("Currency Modified By User-Name: " . $modifiedBy->getName() . "\n");
                    }
                    
                    echo("Currency Id: " . $currency->getId() . "\n");
                    echo("Currency IsoCode: " . $currency->getIsoCode() . "\n");
                }
            } else if ($responseHandler instanceof APIException) {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                echo("Message: " . $exception->getMessage() . "\n");
                
                if ($exception->getDetails() != null) {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $key => $value) {
                        echo($key . ": " . $value . "\n");
                    }
                }
            }
        }
    }
}

GetCurrency::initialize();
$currencyId = "1055806000006008002";
GetCurrency::getCurrency($currencyId);
?>
