<?php
namespace com\zoho\crm\sample\wizards;

use com\zoho\api\authenticator\OAuthBuilder;
use com\zoho\crm\api\dc\INDataCenter;
use com\zoho\crm\api\InitializeBuilder;
use com\zoho\crm\api\ParameterMap;
use com\zoho\crm\api\wizards\WizardsOperations;
use com\zoho\crm\api\wizards\GetWizardByIDParam;
use com\zoho\crm\api\wizards\ResponseWrapper;
use com\zoho\crm\api\wizards\APIException;

require_once "vendor/autoload.php";

class GetWizardById
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

    /**
     * <h3> Get Wizard By Id </h3>
     * This method is used to get the details of a specific wizard and print the response.
     * @param wizardId - The ID of the Wizard to be obtained
     * @param layoutId - The ID of the Layout
     * @throws Exception
     */
    public static function getWizardById(string $wizardId, string $layoutId)
    {
        $wizardsOperations = new WizardsOperations();
        $paramInstance = new ParameterMap();
        $paramInstance->add(GetWizardByIDParam::layoutId(), $layoutId);
        
        $response = $wizardsOperations->getWizardById($wizardId, $paramInstance);
        if($response != null)
        {
            echo("Status code " . $response->getStatusCode() . "\n");
            if(in_array($response->getStatusCode(), array(204, 304)))
            {
                echo($response->getStatusCode() == 204? "No Content\n" : "Not Modified\n");
                return;
            }
            $responseHandler = $response->getObject();
            if($responseHandler instanceof ResponseWrapper)
            {
                $responseWrapper = $responseHandler;
                $wizards = $responseWrapper->getWizards();
                foreach($wizards as $wizard)
                {
                    echo("Wizard CreatedTime: " ); print_r($wizard->getCreatedTime()); echo("\n");
                    echo("Wizard ModifiedTime: " ); print_r($wizard->getModifiedTime()); echo("\n");
                    $module = $wizard->getModule();
                    if($module != null)
                    {
                        echo("Wizard Module APIName: " . $module->getAPIName() . "\n");
                        echo("Wizard Module Id: " . $module->getId() . "\n");
                    }
                    echo("Wizard Name: " . $wizard->getName() . "\n");
                    $modifiedBy = $wizard->getModifiedBy();
                    if($modifiedBy != null)
                    {
                        echo("Wizard Modified By User-Name: " . $modifiedBy->getName() . "\n");
                        echo("Wizard Modified By User-ID: " . $modifiedBy->getId() . "\n");
                    }
                    $profiles = $wizard->getProfiles();
                    if($profiles != null)
                    {
                        foreach($profiles as $profile)
                        {
                            echo("Wizard Profile Name: " . $profile->getName() . "\n");
                            echo("Wizard Profile ID: " . $profile->getId() . "\n");
                        }
                    }
                    echo("Wizard Active: " ); print_r($wizard->getActive()); echo("\n");
                    $containers = $wizard->getContainers();
                    if($containers != null)
                    {
                        foreach($containers as $container)
                        {
                            $layout = $container->getLayout();
                            if($layout != null)
                            {
                                echo("Wizard Container Layout Name: " . $layout->getName() . "\n");
                                echo("Wizard Container Layout ID: " . $layout->getId() . "\n");
                            }
                            $chartData = $container->getChartData();
                            if($chartData != null)
                            {
                                $nodes = $chartData->getNodes();
                                if($nodes != null)
                                {
                                    foreach($nodes as $node)
                                    {
                                        echo("Wizard Container ChartData Node PosY: " . $node->getPosY() . "\n");
                                        echo("Wizard Container ChartData Node PosX: " . $node->getPosX() . "\n");
                                        echo("Wizard Container ChartData Node StartNode: "); print_r($node->getStartNode()); echo("\n");
                                        $screen = $node->getScreen();
                                        if($screen != null)
                                        {
                                            echo("Wizard Container ChartData Node Screen DisplayLabel: " . $screen->getDisplayLabel() . "\n");
                                            echo("Wizard Container ChartData Node Screen ID: " . $screen->getId() . "\n");
                                        }
                                    }
                                }
                                $connections = $chartData->getConnections();
                                if($connections != null)
                                {
                                    foreach($connections as $connection)
                                    {
                                        $sourceButton = $connection->getSourceButton();
                                        if($sourceButton != null)
                                        {
                                            self::printButton($sourceButton);
                                        }
                                        $targetScreen = $connection->getTargetScreen();
                                        if($targetScreen != null)
                                        {
                                            self::printScreen($targetScreen);
                                        }
                                    }
                                }
                                $colorPalette = $chartData->getColorPalette();
                                if($colorPalette != null)
                                {
                                    $buttonBackground = $colorPalette->getButtonBackground();
                                    if($buttonBackground != null)
                                    {
                                        echo("Wizard Container ChartData ColorPalette ButtonBackground: "); print_r($buttonBackground); echo("\n");
                                    }
                                }
                                echo("Wizard Container ChartData CanvasWidth: " . $chartData->getCanvasWidth() . "\n");
                                echo("Wizard Container ChartData CanvasHeight: " . $chartData->getCanvasHeight() . "\n");
                            }
                            $screens = $container->getScreens();
                            if($screens != null)
                            {
                                foreach($screens as $screen)
                                {
                                    self::printScreen($screen);
                                }
                            }
                            echo("Wizard Container ID: " . $container->getId() . "\n");
                        }
                    }
                    echo("Wizard ID: " . $wizard->getId() . "\n");
                    $createdBy = $wizard->getCreatedBy();
                    if($createdBy != null)
                    {
                        echo("Wizard Created By User-Name: " . $createdBy->getName() . "\n");
                        echo("Wizard Created By User-ID: " . $createdBy->getId() . "\n");
                    }
                    $portalUserTypes = $wizard->getPortalUserTypes();
                    if($portalUserTypes != null)
                    {
                        foreach($portalUserTypes as $portalUserType)
                        {
                            echo("Wizard PortalUserType ID: " . $portalUserType->getId() . "\n");
                        }
                    }
                    $exemptedPortalUserTypes = $wizard->getExemptedPortalUserTypes();
                    if($exemptedPortalUserTypes != null)
                    {
                        foreach($exemptedPortalUserTypes as $exemptedPortalUserType)
                        {
                            echo("Wizard ExemptedPortalUserType ID: " . $exemptedPortalUserType->getId() . "\n");
                        }
                    }
                    $parentWizard = $wizard->getParentWizard();
                    if($parentWizard != null)
                    {
                        echo("Wizard ParentWizard ID: " . $parentWizard->getId() . "\n");
                        echo("Wizard ParentWizard Name: " . $parentWizard->getName() . "\n");
                    }
                    echo("Wizard Draft: "); print_r($wizard->getDraft()); echo("\n");
                }
            }
            else if($responseHandler instanceof APIException)
            {
                $exception = $responseHandler;
                echo("Status: " . $exception->getStatus()->getValue() . "\n");
                echo("Code: " . $exception->getCode()->getValue() . "\n");
                if($exception->getDetails() != null)
                {
                    echo("Details: \n");
                    foreach ($exception->getDetails() as $keyName => $keyValue)
                    {
                        echo($keyName . ": " . $keyValue . "\n");
                    }
                }
                echo("Message: " . $exception->getMessage()->getValue() . "\n");
            }
        }
    }

    private static function printScreen($screen)
    {
        echo("Screen Id: " . $screen->getId() . "\n");
        echo("Screen DisplayLabel: " . $screen->getDisplayLabel() . "\n");
        echo("Screen APIName: " . $screen->getAPIName() . "\n");
        echo("Screen ReferenceId: " . $screen->getReferenceId() . "\n");
        $conditionalRules = $screen->getConditionalRules();
        if($conditionalRules != null)
        {
            foreach($conditionalRules as $conditionalRule)
            {
                echo("Screen ConditionalRule QueryId: " . $conditionalRule->getQueryId() . "\n");
                if($conditionalRule->getExecuteOn() != null)
                {
                    echo("Screen ConditionalRule ExecuteOn: " . $conditionalRule->getExecuteOn()->getValue() . "\n");
                }
                $criteria = $conditionalRule->getCriteria();
                if($criteria != null)
                {
                    self::printCriteria($criteria);
                }
                $actions = $conditionalRule->getActions();
                if($actions != null)
                {
                    foreach($actions as $action)
                    {
                        echo("Screen ConditionalRule Action ID: " . $action->getId() . "\n");
                        echo("Screen ConditionalRule Action Type: " . $action->getType() . "\n");
                    }
                }
            }
        }
        $segments = $screen->getSegments();
        if($segments != null)
        {
            foreach($segments as $segment)
            {
                self::printSegment($segment);
            }
        }
    }

    private static function printSegment($segment)
    {
        echo("Segment Id: " . $segment->getId() . "\n");
        echo("Segment SequenceNumber: " . $segment->getSequenceNumber() . "\n");
        echo("Segment DisplayLabel: " . $segment->getDisplayLabel() . "\n");
        echo("Segment Type: " . $segment->getType() . "\n");
        echo("Segment ColumnCount: " . $segment->getColumnCount() . "\n");
        $fields = $segment->getFields();
        if($fields != null)
        {
            foreach($fields as $field)
            {
                echo("Segment Field SequenceNumber: " . $field->getSequenceNumber() . "\n");
                echo("Segment Field APIName: " . $field->getAPIName() . "\n");
                echo("Segment Field Id: " . $field->getId() . "\n");
            }
        }
        $buttons = $segment->getButtons();
        if($buttons != null)
        {
            foreach($buttons as $button)
            {
                if($button != null)
                {
                    self::printButton($button);
                }
            }
        }
        $elements = $segment->getElements();
        if($elements != null)
        {
            foreach($elements as $element)
            {
                echo("Segment Element Type: " . $element->getType() . "\n");
                $resource = $element->getResource();
                if($resource != null)
                {
                    echo("Segment Element Resource ID: " . $resource->getId() . "\n");
                    echo("Segment Element Resource Name: " . $resource->getName() . "\n");
                }
            }
        }
    }

    private static function printButton($button)
    {
        echo("Button Id: " . $button->getId() . "\n");
        echo("Button SequenceNumber: " . $button->getSequenceNumber() . "\n");
        echo("Button DisplayLabel: " . $button->getDisplayLabel() . "\n");
        $criteria = $button->getCriteria();
        if($criteria != null)
        {
            self::printCriteria($criteria);
        }
        $targetScreen = $button->getTargetScreen();
        if($targetScreen != null)
        {
            echo("Button TargetScreen DisplayLabel: " . $targetScreen->getDisplayLabel() . "\n");
            echo("Button TargetScreen Id: " . $targetScreen->getId() . "\n");
        }
        echo("Button Type: " . $button->getType() . "\n");
        $message = $button->getMessage();
        if($message != null)
        {
            echo("Button Message Title: " . $message->getTitle() . "\n");
            echo("Button Message Content: " . $message->getContent() . "\n");
        }
        echo("Button Color: " . $button->getColor() . "\n");
        echo("Button Shape: " . $button->getShape() . "\n");
        echo("Button BackgroundColor: " . $button->getBackgroundColor() . "\n");
        echo("Button Visibility: " . $button->getVisibility() . "\n");
        $resource = $button->getResource();
        if($resource != null)
        {
            echo("Button Resource ID: " . $resource->getId() . "\n");
            echo("Button Resource Name: " . $resource->getName() . "\n");
        }
        $transition = $button->getTransition();
        if($transition != null)
        {
            echo("Button Transition Name: " . $transition->getName() . "\n");
            echo("Button Transition Id: " . $transition->getId() . "\n");
        }
        echo("Button Category: " . $button->getCategory() . "\n");
        echo("Button ReferenceId: " . $button->getReferenceId() . "\n");
    }

    private static function printCriteria($criteria)
    {
        if($criteria->getComparator() != null)
        {
            echo("Criteria Comparator: " . $criteria->getComparator() . "\n");
        }
        $field = $criteria->getField();
        if($field != null)
        {
            echo("Criteria Field APIName: " . $field->getAPIName() . "\n");
            echo("Criteria Field ID: " . $field->getId() . "\n");
        }
        echo("Criteria Value: "); print_r($criteria->getValue()); echo("\n");
        $criteriaGroup = $criteria->getGroup();
        if($criteriaGroup != null)
        {
            foreach($criteriaGroup as $criteria1)
            {
                self::printCriteria($criteria1);
            }
        }
        if($criteria->getGroupOperator() != null)
        {
            echo("Criteria Group Operator: " . $criteria->getGroupOperator() . "\n");
        }
    }
}

GetWizardById::initialize();
$wizardId = "1055806000026349019";
$layoutId = "1055806000000091055";
GetWizardById::getWizardById($wizardId, $layoutId);
