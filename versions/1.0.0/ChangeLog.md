# Migrating from Zoho CRM PHP SDK 7.0-v3.1.0 to 8.0-v1.0.0

1. [Attachments](#attachments)
    - [Get Attachments](#get-attachments)

2. [ConversionOptions](#conversionOptions)
    - [LeadConversionOptions](#leadconversionoptions)

3. [Fields](#fields)
    - [Get Fields](#get-fields)

4. [Layouts](#layouts)
    - [Get Layouts](#get-layouts)

5. [Notification](#notification)
    - [Disable Notification](#disable-notification)

6. [ZiaOrgEnrichment](#ziaOrgEnrichment)
    - [Create ZiaOrgEnrichment](#create-ziaorgenrichment)
    - [Get ZiaOrgEnrichment](#get-ziaorgenrichment)
    - [Get ZiaOrgEnrichments](#get-ziaorgenrichments)

7. [ZiaPeopleEnrichment](#ziaPeopleEnrichment)
    - [Create ZiaPeopleEnrichment](#create-ziapeopleenrichment)
    - [Get ZiaPeopleEnrichment](#get-ziapeopleenrichment)
    - [Get ZiaPeopleEnrichments](#get-ziapeopleenrichments)

8. [FromAddresses](#fromAddresses)
    - [Get EmailAddresses](#get-emailaddresses)

9. [EmailSharingDetails](#emailSharingDetails)
    - [Get EmailSharingDetails](#get-emailsharingdetails)

10. [Profile](#profile)
    - [Get Profiles](#get-profiles)

11. [EnrollCadences](#enrollCadences)
    - [EnrollCadences](#enrolcadenced)
    - [UnenrollCadences](#unenrollCadences)

12. [ScoringRules](#scoringrules)
    - [Get ScoringRule](#get-scoringrule)

13. [Tags](#tags)
    - [AddTagsToRecord](#addtagstorecord)
    - [RemoveTagsFromRecord](#removetagsfromrecord)


## Attachments

### Get Attachments

- Changes Note : Introduced recordStatusS, attachmentSourceS, fileIdS, fieldStates and ziaVisions fields in Attachment

- PHP SDK 7.0-v3.1.0

    ```php
    $attachments = $responseWrapper->getData();
    foreach ($attachments as $attachment)
    {
        echo "Attachment ID: " + attachment->getId() ;
    }
    ```

- PHP SDK 8.0-v1.0.0

    ```php
    $attachments = $responseWrapper->getData();
    foreach ($attachments as $attachment)
    {
        echo "Attachment ID: " + attachment->getId();
        echo "Attachment RecordStatusS: " + attachment->getRecordStatusS();
        echo "Attachment FieldStates: " + attachment->getFieldStates();
        echo "Attachment ZiaVisions: " + attachment->getZiaVisions();
        echo "Attachment FileIds: " + attachment->getFileIdS();
        echo "Attachment AttachmentSourceS: " + attachment->getAttachmentSourceS();
    }
    ```

## ConversionOptions

### LeadConversionOptions

- Changes Note: method name updated from getConversionoptions to getConversionOptions in ResponseWrapper

- PHP SDK 7.0-v3.1.0

    ```php
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $conversionOptionResponseWrapper = $responseHandler;
	    $conversionOption = $conversionOptionResponseWrapper->getConversionoptions();    
    }
    ```
- PHP SDK 8.0-v1.0.0

    ```php
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $conversionOptionResponseWrapper = $responseHandler;
	    $conversionOption = $conversionOptionResponseWrapper->getConversionOptions();    
    }
    ```


## Fields

### Get Fields

- Changes Note : New fields[linkingDetails, connectedDetails, relatedList] introduced in MultiSelectLookup and fields[displayLabel, linkingModule, connectedModule, lookupApiname, apiName, connectedfieldApiname, connectedlookupApiname, id] are removed and Introduced globalPicklistValue field in PickListValue.

- PHP SDK 7.0-v3.1.0

    ```php
    //get multi select lookup for field
    $multiSelectLookup = $field->getMultiselectlookup();
    if ($multiSelectLookup != null)
    {
        echo "Field MultiSelectLookup DisplayLabel: " + $multiSelectLookup->getDisplayLabel();
        echo "Field MultiSelectLookup LinkingModule: " + $multiSelectLookup->getLinkingModule();
        echo "Field MultiSelectLookup LookupApiname: " + $multiSelectLookup->getLookupApiname();
        echo "Field MultiSelectLookup APIName: " + $multiSelectLookup->getAPIName();
        echo "Field MultiSelectLookup ConnectedlookupApiname: " + $multiSelectLookup->getConnectedlookupApiname();
        echo "Field MultiSelectLookup ID: " + $multiSelectLookup->getId();
        echo "Field MultiSelectLookup connected module: " + $multiSelectLookup->getConnectedModule();
    }
    //get multi user lookup for field
    if ($field->getMultiuserlookup() != null)
    {
        $multiuserlookup = $field->getMultiuserlookup();
        echo "Get Multiselectlookup DisplayLabel" + $multiuserlookup->getDisplayLabel();
        echo "Get Multiselectlookup LinkingModule" + $multiuserlookup->getLinkingModule();
        echo "Get Multiselectlookup LookupAPIName" + $multiuserlookup->getLookupApiname();
        echo "Get Multiselectlookup APIName" + $multiuserlookup->getAPIName();
        echo "Get Multiselectlookup Id" + $multiuserlookup->getId();
        echo "Get Multiselectlookup ConnectedModule" + $multiuserlookup->getConnectedModule();
        echo "Get Multiselectlookup ConnectedlookupAPIName" + $multiuserlookup->getConnectedlookupApiname();
    }
    ```

- PHP SDK 8.0-v1.0.0

    ```php
    //get the multi select lookup for field
    $multiSelectLookup = $field->getMultiselectlookup();
    if ($multiSelectLookup != null)
    {
        $linkingDetails = $multiSelectLookup->getLinkingDetails();
        $module = $linkingDetails->getModule();
        echo "Field Multiselectlookup LinkingDetails Module Visibility: " + $module->getVisibility();
        echo "Field Multiselectlookup LinkingDetails Module PluralLabel: " + $module->getPluralLabel();
        echo "Field Multiselectlookup LinkingDetails Module APIName: " + $module->getAPIName();
        echo "Field Multiselectlookup LinkingDetails Module Id: " + $module->getId();

        $lookupfield = $linkingDetails->getLookupField();
        echo "Field MultiSelectLookup LinkingDetails LookupField APIName: " + $lookupfield->getAPIName();
        echo "Field MultiSelectLookup LinkingDetails LookupField FieldLabel: " + $lookupfield->getFieldLabel();
        echo "Field MultiSelectLookup LinkingDetails LookupField Id: " + $lookupfield->getId();

        $connectedLookupField = $linkingDetails->getConnectedLookupField();
        echo "Field MultiSelectLookup LinkingDetails ConnectedLookupField APIName: " + $connectedLookupField->getAPIName();
        echo "Field MultiSelectLookup LinkingDetails ConnectedLookupField FieldLabel: " + $connectedLookupField->getFieldLabel();
        echo "Field MultiSelectLookup LinkingDetails ConnectedLookupField Id: " + $connectedLookupField->getId();

        $connectedDetails = $multiSelectLookup->getConnectedDetails();
        $lookupField = $connectedDetails->getField();
        echo "Field Multiselectlookup ConnectedDetails Field APIName: " + $lookupField->getAPIName();
        echo "Field Multiselectlookup ConnectedDetails Field FieldLabel: " + $lookupField->getFieldLabel();
        echo "Field Multiselectlookup ConnectedDetails Field id: " + $lookupField->getId();

        $connectedModule = $connectedDetails->getModule();
        echo "Field MultiSelectLookup ConnectedDetails Module PluralLabel: " + $connectedModule->getPluralLabel();
        echo "Field MultiSelectLookup ConnectedDetails Module APIName: " + $connectedModule->getAPIName();
        echo "Field MultiSelectLookup ConnectedDetails Module Id: " + $connectedModule->getId();

        $layouts = $connectedDetails->getLayouts();
        if ($layouts != null)
        {
            foreach ($layouts as $layout)
            {
                echo "Field MultiSelectLookup ConnectedDetails Layouts APIName: " + $layout->getAPIName();
                echo "Field MultiSelectLookup ConnectedDetails Layouts Id: " + $layout->getId();
            }
        }

        $relatedList = $multiSelectLookup->getRelatedList();
        if ($relatedList != null)
        {
            echo "Field MultiSelectLookup RelatedList DisplayLabel: " + $relatedList->getDisplayLabel();
            echo "Field MultiSelectLookup RelatedList APIName: " + $relatedList->getAPIName();
            echo "Field MultiSelectLookup RelatedList Id: " + $relatedList->getId();
        }
    }
    // get the multi user lookup for field
    if ($field->getMultiuserlookup() != null)
    {
        $multiuserlookup = $field->getMultiuserlookup();
        $linkingDetails = $multiuserlookup->getLinkingDetails();
        $module = $linkingDetails->getModule();
        echo "Field Multiuserlookup LinkingDetails Module Visibility: " + $module->getVisibility();
        echo "Field Multiuserlookup LinkingDetails Module PluralLabel: " + $module->getPluralLabel();
        echo "Field Multiuserlookup LinkingDetails Module APIName: " + $module->getAPIName();
        echo "Field Multiuserlookup LinkingDetails Module Id: " + $module->getId();

        $lookupfield = $linkingDetails->getLookupField();
        echo "Field Multiuserlookup LinkingDetails LookupField APIName: " + $lookupfield->getAPIName();
        echo "Field Multiuserlookup LinkingDetails LookupField FieldLabel: " + $lookupfield->getFieldLabel();
        echo "Field Multiuserlookup LinkingDetails LookupField Id: " + $lookupfield->getId();

        $connectedLookupField = $linkingDetails->getConnectedLookupField();
        echo "Field Multiuserlookup LinkingDetails ConnectedLookupField APIName: " + $connectedLookupField->getAPIName();
        echo "Field Multiuserlookup LinkingDetails ConnectedLookupField FieldLabel: " + $connectedLookupField->getFieldLabel();
        echo "Field Multiuserlookup LinkingDetails ConnectedLookupField Id: " + $connectedLookupField->getId();

        echo "Field Multiuserlookup RecordAccess: " + $multiuserlookup->getRecordAccess();
    }
    $globalPicklist = $field->getGlobalPicklist();
    if ($globalPicklist != null)
    {
        echo "Fields GlobalPicklist Id: " + $globalPicklist->getId();
        echo "Fields GlobalPicklist APIName: " + $globalPicklist->getAPIName();
    }
    $globalPicklist = $pickListValue->getGlobalPicklistValue();
    if ($globalPicklist != null)
    {
        echo "Fields GlobalPicklistValue Id: " + $globalPicklist->getId();
        echo "Fields GlobalPicklistValue APIName: " + $globalPicklist->getAPIName();
    }
    ```

## Layouts

### Get Layouts

- Changes Note : Updated getDefaultview method name to getDefaultView and introduced new fields in MutliSelectLookup.

- PHP SDk 7.0-v3.1.0

    ```php
    $layouts = $responseWrapper->getLayouts();
    foreach ($layouts as layout)
    {
        $profiles = $layout->getProfiles();
        if ($profiles != null)
        {
            foreach ($profiles as profile)
            {
                $defaultView = $profile->getDefaultview();
            }
        }
    }
    $associationDetails = $field->getAssociationDetails();
    if ($associationDetails != null)
    {
        $lookupField = $associationDetails->getLookupField();
    }
    //get multi select lookup for field
 	$multiSelectLookup = $field->getMultiselectlookup();
    if ($multiSelectLookup != null)
    {
        echo "Field MultiSelectLookup DisplayLabel: " + $multiSelectLookup->getDisplayLabel();
        echo "Field MultiSelectLookup LinkingModule: " + $multiSelectLookup->getLinkingModule();
        echo "Field MultiSelectLookup LookupApiname: " + $multiSelectLookup->getLookupApiname();
        echo "Field MultiSelectLookup APIName: " + $multiSelectLookup->getAPIName();
        echo "Field MultiSelectLookup ConnectedlookupApiname: " + $multiSelectLookup->getConnectedlookupApiname();
        echo "Field MultiSelectLookup ID: " + $multiSelectLookup->getId();
        echo "Field MultiSelectLookup connected module: " + $multiSelectLookup->getConnectedModule();
    }
    //get multi user lookup for field
	if ($field->getMultiuserlookup() != null)
    {
        $multiuserlookup = $field->getMultiuserlookup();
        echo "Get Multiselectlookup DisplayLabel" + $multiuserlookup->getDisplayLabel();
        echo "Get Multiselectlookup LinkingModule" + $multiuserlookup->getLinkingModule();
        echo "Get Multiselectlookup LookupAPIName" + $multiuserlookup->getLookupApiname();
        echo "Get Multiselectlookup APIName" + $multiuserlookup->getAPIName();
        echo "Get Multiselectlookup Id" + $multiuserlookup->getId();
        echo "Get Multiselectlookup ConnectedModule" + $multiuserlookup->getConnectedModule();
        echo "Get Multiselectlookup ConnectedlookupAPIName" + $multiuserlookup->getConnectedlookupApiname();
    }
    ```

  - PHP SDK 8.0-v1.0.0

      ```php
      $layouts = $responseWrapper->getLayouts();
      foreach ($layouts as layout)
      {
           $profiles = $layout->getProfiles();
          if ($profiles != null)
          {
              foreach ($profiles as $profile)
              {
                  $defaultView = $profile->getDefaultView();
              }
          }
      }
      $associationDetails = $field->getAssociationDetails();
      if ($associationDetails != null)
      {
          $lookupField = $associationDetails->getLookupField();
      }
      //get multi select lookup for field
      $multiSelectLookup = $field->getMultiselectlookup();
      if ($multiSelectLookup != null)
      {
          $linkingDetails = $multiSelectLookup->getLinkingDetails();
          $module = $linkingDetails->getModule();
          echo "Field Multiselectlookup LinkingDetails Module Visibility: " + $module->getVisibility();
          echo "Field Multiselectlookup LinkingDetails Module PluralLabel: " + $module->getPluralLabel();
          echo "Field Multiselectlookup LinkingDetails Module APIName: " + $module->getAPIName();
          echo "Field Multiselectlookup LinkingDetails Module Id: " + $module->getId();
        
          $lookupfield = $linkingDetails->getLookupField();
          echo "Field MultiSelectLookup LinkingDetails LookupField APIName: " + $lookupfield->getAPIName();
          echo "Field MultiSelectLookup LinkingDetails LookupField FieldLabel: " + $lookupfield->getFieldLabel();
          echo "Field MultiSelectLookup LinkingDetails LookupField Id: " + $lookupfield->getId();
        
          $connectedLookupField = $linkingDetails->getConnectedLookupField();
          echo "Field MultiSelectLookup LinkingDetails ConnectedLookupField APIName: " + $connectedLookupField->getAPIName();
          echo "Field MultiSelectLookup LinkingDetails ConnectedLookupField FieldLabel: " + $connectedLookupField->getFieldLabel();
          echo "Field MultiSelectLookup LinkingDetails ConnectedLookupField Id: " + $connectedLookupField->getId();
        
          $connectedDetails = $multiSelectLookup->getConnectedDetails();
          $lookupField = $connectedDetails->getField();
          echo "Field Multiselectlookup ConnectedDetails Field APIName: " + $lookupField->getAPIName();
          echo "Field Multiselectlookup ConnectedDetails Field FieldLabel: " + $lookupField->getFieldLabel();
          echo "Field Multiselectlookup ConnectedDetails Field id: " + $lookupField->getId();
        
          $connectedModule = $connectedDetails->getModule();
          echo "Field MultiSelectLookup ConnectedDetails Module PluralLabel: " + $connectedModule->getPluralLabel();
          echo "Field MultiSelectLookup ConnectedDetails Module APIName: " + $connectedModule->getAPIName();
          echo "Field MultiSelectLookup ConnectedDetails Module Id: " + $connectedModule->getId();
        
          $layouts = $connectedDetails->getLayouts();
          if($layouts != null)
          {
              foreach($layouts as $layout)
              {
                  echo "Field MultiSelectLookup ConnectedDetails Layouts APIName: " + $layout->getAPIName();
                  echo "Field MultiSelectLookup ConnectedDetails Layouts Id: " + $layout->getId();
              }
          }
        
          $relatedList = $multiSelectLookup->getRelatedList();
          if($relatedList != null)
          {
              echo "Field MultiSelectLookup RelatedList DisplayLabel: " + $relatedList->getDisplayLabel();
              echo "Field MultiSelectLookup RelatedList APIName: " + $relatedList->getAPIName();
              echo "Field MultiSelectLookup RelatedList Id: " + $relatedList->getId();
          }
      }
  
      //get multi select lookup for field
      if ($field.getMultiuserlookup() != null)
      {
          $multiuserlookup = $field->getMultiuserlookup();
          $linkingDetails = $multiuserlookup->getLinkingDetails();
          $module = $linkingDetails->getModule();
          echo "Field Multiuserlookup LinkingDetails Module Visibility: " + $module->getVisibility();
          echo "Field Multiuserlookup LinkingDetails Module PluralLabel: " + $module->getPluralLabel();
          echo "Field Multiuserlookup LinkingDetails Module APIName: " + $module->getAPIName();
          echo "Field Multiuserlookup LinkingDetails Module Id: " + $module->getId();
        
          $lookupfield = $linkingDetails->getLookupField();
          echo "Field Multiuserlookup LinkingDetails LookupField APIName: " + $lookupfield->getAPIName();
          echo "Field Multiuserlookup LinkingDetails LookupField FieldLabel: " + $lookupfield->getFieldLabel();
          echo "Field Multiuserlookup LinkingDetails LookupField Id: " + $lookupfield->getId();
        
          $connectedLookupField = $linkingDetails->getConnectedLookupField();
          echo "Field Multiuserlookup LinkingDetails ConnectedLookupField APIName: " + $connectedLookupField->getAPIName();
          echo "Field Multiuserlookup LinkingDetails ConnectedLookupField FieldLabel: " + $connectedLookupField->getFieldLabe();
          echo "Field Multiuserlookup LinkingDetails ConnectedLookupField Id: " + $connectedLookupField->getId();
        
          echo "Field Multiuserlookup RecordAccess: " + $multiuserlookup->getRecordAccess();
      }
      ```

## Notification

### Disable Notification

- Changes Note: Updated setDeleteevents method name to setDeleteEvents.

- PHP SDK 7.0-v3.1.0

    ```php
    $notification = new Notification();
    $notification.setDeleteevents(new Choice(true);    
    ```
- PHP SDK 8.0-v1.0.0

    ```php
    $notification = new Notification();
    $notification.setDeleteEvents(new Choice(true);      
    ```

## ZiaOrgEnrichment

### Create ZiaOrgEnrichment

- Changes Note: Updated setZiaorgenrichment and getZiaorgenrichment method names to setZiaOrgEnrichment and getZiaOrgEnrichment respectively.

- PHP SDK 7.0-v3.1.0
    ```php
    $request = new BodyWrapper();
    $request->setZiaorgenrichment($ziaorgenrichment;
    $paramInstance = new ParameterMap();
    $paramInstance->add(CreateZiaOrgEnrichmentParam::MODULE(), "Vendors";
    $response = $ziaOrgEnrichmentOperations->createZiaOrgEnrichment($request, $paramInstance;
    if ($response != null)
    {
        $actionHandler = $response->getObject();
        if ($actionHandler instanceof ActionWrapper)
        {
            $actionWrapper = $actionHandler;
            $actionresponses = $actionWrapper->getZiaorgenrichment();
        }
    }
    ```
- PHP SDK 8.0-v1.0.0
    ```php
    $request = new BodyWrapper();
    $request->setZiaOrgEnrichment($ziaorgenrichment;
    $paramInstance = new ParameterMap();
    $paramInstance->add(CreateZiaOrgEnrichmentParam::MODULE(), "Vendors";
    $response = $ziaOrgEnrichmentOperations->createZiaOrgEnrichment($request, $paramInstance;
    if ($response != null)
    {
        $actionHandler = $response->getObject();
        if ($actionHandler instanceof ActionWrapper)
        {
            $actionWrapper = $actionHandler;
            $actionresponses = $actionWrapper->getZiaOrgEnrichment();
        }
    }
    ```

### Get ZiaOrgEnrichment

- Changes Note: Updated getZiaorgenrichment method name to getZiaOrgEnrichment.

- PHP SDK 7.0-v3.1.0
    ```php
    $ziaOrgEnrichmentOperations = new ZiaOrgEnrichmentOperations();
    $response = $ziaOrgEnrichmentOperations->getZiaOrgEnrichment($ziaOrgEnrichmentId);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiaorgenrichment();
    }
    ```
- PHP SDK 8.0-v1.0.0

    ```php
     $ziaOrgEnrichmentOperations = new ZiaOrgEnrichmentOperations();
    $response = $ziaOrgEnrichmentOperations->getZiaOrgEnrichment($ziaOrgEnrichmentId);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiaOrgEnrichment();
    }
    ```

### Get ZiaOrgEnrichments

- Changes Note: Updated getZiaorgenrichment method name to getZiaOrgEnrichment.

- PHP SDK 7.0-v3.1.0
    ```php
    $ziaOrgEnrichmentOperations = new ZiaOrgEnrichmentOperations();
    $paramInstance = new ParameterMap();
    $response = $ziaOrgEnrichmentOperations->getZiaOrgEnrichments($paramInstance);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiaorgenrichment();
    }
    ```
- PHP SDK 8.0-v1.0.0
    ```php
    $ziaOrgEnrichmentOperations = new ZiaOrgEnrichmentOperations();
    $paramInstance = new ParameterMap();
    $response = $ziaOrgEnrichmentOperations->getZiaOrgEnrichments($paramInstance);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiaOrgEnrichment();
    }
   ```

## ZiaPeopleEnrichment

### Create ZiaPeopleEnrichment

- Changes Note : Updated setZiapeopleenrichment and getZiapeopleenrichment methods name to setZiaPeopleEnrichment and getZiaPeopleEnrichment respectively.

- PHP SDK 7.0-v3.1.0
    ```php
    $request = new BodyWrapper();
    $request->setZiapeopleenrichment($ziapeopleenrichment;
    $paramInstance = new ParameterMap();
    $paramInstance->add(CreateZiaPeopleEnrichmentParam::MODULE()), "Leads";
    $response = $ziaPeopleEnrichmentOperations->createZiaPeopleEnrichment($request, $paramInstance);
    if ($response != null)
    {
        $actionHandler = $response->getObject();
        if ($actionHandler instanceof ActionWrapper)
        {
            $actionWrapper = $actionHandler;
            $actionresponses = $actionWrapper->getZiapeopleenrichment();
        } 
    }
    ```

- PHP SDK 8.0-v1.0.0
    ```php
     $request = new BodyWrapper();
    $request->setZiaPeopleEnrichment($ziapeopleenrichment;
    $paramInstance = new ParameterMap();
    $paramInstance->add(CreateZiaPeopleEnrichmentParam::MODULE()), "Leads";
    $response = $ziaPeopleEnrichmentOperations->createZiaPeopleEnrichment($request, $paramInstance);
    if ($response != null)
    {
        $actionHandler = $response->getObject();
        if ($actionHandler instanceof ActionWrapper)
        {
            $actionWrapper = $actionHandler;
            $actionresponses = $actionWrapper->getZiaPeopleEnrichment();
        } 
    }
    ```

### Get ZiaPeopleEnrichment

- Changes Note : Updated getZiapeopleenrichment method name to getZiaPeopleEnrichment.

- PHP SDK 7.0-v3.1.0
    ```php
    $ziaPeopleEnrichmentOperations = new ZiaPeopleEnrichmentOperations(); 
    $response = $ziaOrgEnrichmentOperations->getZiaPeopleEnrichment($ziaOrgEnrichmentId);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper =  $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiapeopleenrichment();
    }
    ```

- PHP SDK 8.0-v1.0.0
    ```php
    $ziaPeopleEnrichmentOperations = new ZiaPeopleEnrichmentOperations(); 
    $response = $ziaOrgEnrichmentOperations->getZiaPeopleEnrichment($ziaOrgEnrichmentId);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper =  $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiaPeopleEnrichment();
    }
    ```

### Get ZiaPeopleEnrichments

- Changes Note : Updated getZiapeopleenrichment method name to getZiaPeopleEnrichment.

- PHP SDK 7.0-v3.1.0
    ```php
    $ziaPeopleEnrichmentOperations = new ZiaPeopleEnrichmentOperations(); 
    $paramInstance = new ParameterMap();
    $response = $ziaOrgEnrichmentOperations->getZiaPeopleEnrichments($paramInstance);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper =  $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiapeopleenrichment();
    }
    ```

- PHP SDK 8.0-v1.0.0
    ```php
    $ziaPeopleEnrichmentOperations = new ZiaPeopleEnrichmentOperations(); 
    $paramInstance = new ParameterMap();
    $response = $ziaOrgEnrichmentOperations->getZiaPeopleEnrichments($paramInstance);
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper =  $responseHandler;
        $ziaorgenrichment = $responseWrapper->getZiaPeopleEnrichment();
    }
    ```

## FromAddresses

### Get EmailAddresses

- Changes Note: Introduced new param userId in getEmailAddresses method.

- PHP SDK 7.0-v3.1.0
    ```php
    class FromAddresses {
        public static function getEmailAddresses() {
            $sendMailsOperations = new FromAddressesOperations();
        }
    }
    FromAddresses::getEmailAddresses();
    ```

- PHP SDK 8.0-v1.0.0

    ```php
    class FromAddresses {
        public static function getEmailAddresses($userId) {
            $sendMailsOperations = new FromAddressesOperations($userId);
        }
    }
    $userId = "342312312";
    FromAddresses::getEmailAddresses($userId);
    ```

## EmailSharingDetails

### Get EmailSharingDetails

- Changes Note : Updated getEmailssharingdetails method name to getEmailsSharingDetails.

- PHP SDK 7.0-v3.1.0

    ```php
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $emailSharingdetails = $responseWrapper->getEmailssharingdetails();
    }
    ```

- PHP SDK 8.0-v1.0.0

    ```php
    $responseHandler = response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $emailSharingdetails = $responseWrapper->getEmailsSharingDetails();
    }
    ```

## Profile

### Get Profiles

- Changes Note : Updated getDefaultview method name to getDefaultView

- PHP SDK 7.0-v3.1.0

    ```php
    $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $profiles = $responseWrapper->getProfiles();
        foreach ($profiles as $profile)
        {
            $defaultView = $profile->getDefaultview();
        }
    }
    ```

- PHP SDK 8.0-v1.0.0

    ```php
  $responseHandler = $response->getObject();
    if ($responseHandler instanceof ResponseWrapper)
    {
        $responseWrapper = $responseHandler;
        $profiles = $responseWrapper->getProfiles();
        foreach ($profiles as $profile)
        {
            $defaultView = $profile->getDefaultView();
        }
    }
    ```

## EnrollCadences

### EnrollCadences

- Changes Note: Updated EnrolCadences to EnrollCadences and enrolCadences method name to enrollCadences.

- PHP SDK 7.0-v3.1.0

    ```php
    class EnrolCadences
    {
        public static function enrolCadences($moduleAPIName)
	    {
            $response = $cadencesExecutionOperations->enrolCadences($moduleAPIName, $request);
        }
    }
    ```

- PHP SDK 8.0-v1.0.0

    ```php
    class EnrollCadences
    {
        public static function enrolCadences($moduleAPIName)
	    {
            $response = $cadencesExecutionOperations->enrollCadences($moduleAPIName, $request);
        }
    }
    ```

### UnenrollCadences

- Changes Note: Updated UnenrolCadences to UnenrollCadences and unenrolCadences method name to unenrollCadences.

- PHP SDK 7.0-v3.1.0

    ```php
    class UnenrolCadences
    {
        public static function enrolCadences($moduleAPIName)
	    {
            $response = $cadencesExecutionOperations->unenrolCadences($moduleAPIName, $request);
        }
    }
    ```

- PHP SDK 8.0-v1.0.0

    ```php
    class UnenrollCadences
    {
        public static function enrolCadences($moduleAPIName)
	    {
            $response = $cadencesExecutionOperations->unenrollCadences($moduleAPIName, $request);
        }
    }
    ```

## ScoringRules

### Get ScoringRule

- Changes Note : module param removed in getScoringRule method

- PHP SDK 7.0-v3.1.0

    ```php
    public static function getScoringRule($module, $id) 
    {
        $scoringRulesOperations = new ScoringRulesOperations();
		$paramInstance = new ParameterMap();
		$response = $scoringRulesOperations->getScoringRule(module, id, paramInstance);   
    }
    ```

- PHP SDK 8.0-v1.0.0

    ```php
   public static function getScoringRule($id) 
    {
        $scoringRulesOperations = new ScoringRulesOperations();
		$paramInstance = new ParameterMap();
		$response = $scoringRulesOperations->getScoringRule(id, paramInstance);   
    }
    ```

## Tags

### AddTagsToRecord

- Changes Note : location swap of recordId and moduleAPIName params in addTags method.

- PHP SDk 7.0-v3.1.0

    ```php
    $tagsOperations = new TagsOperations();
    $response = $tagsOperations->addTags($recordId, $moduleAPIName, $request, $paramInstance);
    ```

- PHP SDk 8.0-v1.0.0

    ```php
    $tagsOperations = new TagsOperations();
    $response = $tagsOperations->addTags($moduleAPIName, $recordId, $request, $paramInstance);
    ```

### RemoveTagsFromRecord

- Changes Note : location swap of recordId and moduleAPIName params in removeTags method.

- PHP SDk 7.0-v3.1.0

    ```php
    $tagsOperations = new TagsOperations();
    $response = $tagsOperations->removeTags($recordId, $moduleAPIName, $request);
    ```

- PHP SDk 8.0-v1.0.0

    ```php
    $tagsOperations = new TagsOperations();
    $response = $tagsOperations->removeTags($moduleAPIName, $recordId, $request);
    ```

