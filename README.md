# FreeAgent API Wrapper - PHP

A PHP Wrapper for the FreeAgent accounting APIs.

Current version 0.1.x is beta. Please include using strict Composer versions.

## Installation

To get started, add the package to your project by issuing the following command:

    composer require fernleafsystems/apiwrappers-freeagent

Current version 0.1.x is beta. Please include using strict Composer versions.

## Getting Started

This package has 2 parts:

1. OAuth2 authorization
2. FreeAgent API

The OAuth2 is mainly delivered as a Provider of the 'The League of Extraordinary Packages' OAuth2
implementation. It uses their latest version and make this package compatible with only PHP 5.6+

### 1) OAuth2 Authorization

OAuth2 is a big enough topic that it's beyond the scope of this readme, but the
basics on how to achieve it with this package are as follows.

**Stage 1 - "Pre-Auth": Build and Redirect User to Authorization URL**
```php

	$oOauthProvider = ( new Connection() )
    		->setClientId( $sFreeagentAppClientId )
    		->setIsSandbox( $bIsSandbox )
    		->getOAuthProvider();
    		
	$sRedirectUrlBase = $oOauthProvider->getBaseAuthorizationUrl();
	
	$aAuthUrlParams = array(
    	'redirect_uri'  => 'https://www.theUrlForMyApp.com/To/Receive/Redirection/From/OAuth',
    	'client_id'     => $sFreeagentAppClientId,
    	'response_type' => 'code'
	);
    
	$sAuthorizationUrl = $sRedirectUrlBase.'?'.http_build_query( $aAuthUrlParams );
	
	header( 'Location: '. $sAuthorizationUrl );
```

Assuming this is built correctly, the user will authorize your integration and be
redirected back to your app based on the `redirect_uri` parameter.

At this point your App must capture the OAuth code that will be appended to the
redirect, with the GET key `code`. You then need to store this somewhere in your app.

**Stage 2 - "Pre-Token": Request an Access Token**

To perform actions against the API you send an Access Token - not the OAuth code you
obtained in the previous stage. To get this, your app will send a request for a new
token and it will look like this:

```php

	$aTokenRequestParameters = array(
    	'code'          => $sOauthCodeFromThePreviousStage,
    	'client_id'     => $sFreeagentAppClientId,
    	'client_secret' => $sFreeagentAppClientSecret,
    	'redirect_uri'  => 'https://www.theUrlForMyApp.com/To/Receive/Redirection/From/OAuth'
	);
	
	$oOauthProvider = ( new Connection() )
    		->setClientId( $sFreeagentAppClientId )
    		->setIsSandbox( $bIsSandbox )
    		->getOAuthProvider();
	
	$oAccessToken = $oOauthProvider->getAccessToken( 'authorization_code', $aTokenRequestParameters );
	
	// Store the Access Token $oAccessToken. 
```
Several *critical* points to note here.

The `redirect_uri` parameter is not strictly speaking used in this request.
But YOU MUST INCLUDE IT. FreeAgent will cry very long and hard if the `redirect_uri`
value used in this stage does not equal exactly the same value used in the previous
stage. Read this again - it must be included and be EXACTLY the same.

The Access Token `$oAccessToken` is a `\League\OAuth2\Client\Token\AccessToken` and has all
the accessor methods you need. You should store the access token value for future use, its
expiration time, and also the refresh token value - you'll use this after the token has
expired to request a new access token

**Stage 3 - "Expired-Token": Request a new Access Token**

```php
	$aTokenRequestParameters = array(
    	'client_id'     => $sFreeagentAppClientId,
    	'client_secret' => $sFreeagentAppClientSecret,
    	'refresh_token' => $sOAuth2RefreshTokenStoredFromPreviousStage
	);
	
	$oOauthProvider = ( new Connection() )
    		->setClientId( $sFreeagentAppClientId )
    		->setIsSandbox( $bIsSandbox )
    		->getOAuthProvider();
	
	$oAccessToken = $oOauthProvider->getAccessToken( 'refresh_token', $aTokenRequestParameters );
	
	// Store the Access Token $oAccessToken. 
```

## 2) Querying the FreeAgent API
Now that you have your AccessToken from Stage 3 above, you can make requests to the
FreeAgent API with ease. Here's an example on how to request your Company information.

### Example: Simple Data Retrieval

```php
	$oConnection = ( new Connection() )
    	->setIsSandbox( $bIsSandbox )
    	->setAccessToken( $sAccessTokenFromStage3 );
	
	$oCompany = ( new \FernleafSystems\ApiWrappers\Freeagent\Entities\Company\Retrieve() )
	    ->setConnection( $oConnection )
	    ->retrieve();
```

In this example we simply create a Connection object and populate it with the Access Token,
then feed this into the API entity Class that we want to use. In this case it's a retrieval
for the Company Entity. This will then return a CompanyVO, which has lots of useful
accessor methods on there for you to grab the particular piece of information you like, eg.:

```php
	$oCompany = ( new \FernleafSystems\ApiWrappers\Freeagent\Entities\Company\Retrieve() )
	    ->setConnection( $oConnection )
	    ->retrieve();
	    
	echo $oCompany->getName();
```

This will print, for example, `Acme Inc.` if your company is so-called.

All the API classes are built like this and to perform any operations you just need to
feed it the Connection object, and the system will do the rest.

Note: If you don't set the Sandbox flag, it'll assume it's **not** in the sandbox
so you can exclude this flag if you're operating on live.

### Example: Retrieving a Contact by its known FreeAgent ID

```php
	$oContact = ( new \FernleafSystems\ApiWrappers\Freeagent\Entities\Contacts\Retrieve() )
	    ->setConnection( $oConnection )
	    ->setEntityId( 12345 )
	    ->retrieve();
```

The `setEntityId()` is the primary method for retrieving and updating entities. You must
know the ID before you can attempt to retrieve it or update it, of course.

If you don't provide the ID, the system will throw an `Exception` before making the request.

The object returned, in this particular case, will be a `ContactVO`. It's similar to the
`CompanyVO` provided in the previous example and has helpful accessor methods so you 
don't need to look up details from the API docs.

Taking the `ContactVO` object you've just retrieved, you could create a new Bill for it...

### Example: Creating a new Bill

```php
	$oConnection = ( new Connection() )->setAccessToken( $sAccessTokenFromStage3 );
	
	$oNewBill = ( new \FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Create() )
	    ->setConnection( $oConnection )
	    ->setContact( $oFreeagentContact ) // a Freeagent ContactVO
	    ->setReference( 'My Bill Reference' )
	    ->setTotalValue( '12.34' )  // a float
	    ->setCategory( $oFreeagentContegory ) // a Freeagent CategoryVO
	    ->setDatedOn( '2018-12-18' ) // or unix timestamp
	    ->setDueOn( '2018-12-25' )  // or unix timestamp
	    ->create();
```

This is the bare minimum you need to create a Bill. If any of these items are not
present the API will throw an `Exception` before even making a request.

You can find out what's critical by looking at the method `getCriticalRequestItems()`
on each API entity.

What if you want to find something, because you don't know the entity ID?

## Search/Finding entities based on certain attributes

The FreeAgent API is delightfully inconsistent and makes search/filtering quite tricky. I'm
guessing this is just down to how they've structured their data and their internal functions
and they've mapped these internal inconsistencies out to their API. No matter, we've provided
a way to filter and search.

Depending on what you're filtering and searching for, we can use the built-in filters that
the API has provided, and failing that, we request in bulk and search through the results
until we find any that match. It's greater load on their API, but we have no choice.

Here are some search examples.

### Find a Bill with a given reference

```php
	$oFoundBill = ( new \FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Find() )
	    ->setConnection( $oConnection )
	    ->filterByReference( 'My Bill Reference' )
	    ->first();
```
Using `first()` you assume that you have only 1 bill with the given reference. The problem
with this example is that you haven't set a boundary for *when* this bill might have been
created, so this could be quite a big API operation while it finds your bill in the haystack.

Instead, you could limit it by date, and even use a range with a radius.

### Find a Bill with a given reference inside a date range

```php
	$oFoundBill = ( new \FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Find() )
	    ->setConnection( $oConnection )
	    ->filterByDateRange( 123123123, 5 )
	    ->filterByReference( 'My Bill Reference' )
	    ->first();
```

This now limits the searching for this bill to within a specific date range. The 1st
parameter **must be a UNIX timestamp**, and the 2nd parameter is the number of days
radius outside of the timestamp, so in this case, 5 days before, and 5 days after -
a time window of 10 days total.

Note: If no bill is found to match this criteria, `null` is returned.

In this example we're looking for 1 bill with the given reference. But what if we wanted
all the bills within that time period.

### Find all Bills within a given date range

```php
	$aAllBills = ( new \FernleafSystems\ApiWrappers\Freeagent\Entities\Bills\Find() )
	    ->setConnection( $oConnection )
	    ->filterByDateRange( 123123123, 5 )
	    ->all();
```

We've removed the Reference filter and now calling using `all()`. This will return
an array of `BillVO` objects. It may be empty, or not, but it will be an `array()`.

## The Rest...

Each entity type has its own set of methods, parameters, and filter options. You have
to look at each to determine what your options are.

The examples above are specific to those particular entities. There is of course
some overlap, but all entities follow the documentation and specification of the
FreeAgent API.

## Errors and Exceptions

When retrieving, creating and updating, there are some basic checks on the data to ensure
the absolute minimums are provided before a request is sent out. If these checks fail
an `Exception` is thrown.

If these checks don't fail, and the request fails, you have a few options. This will likely
change in the future as the current implementation is flawed and not satisfactory.

As it currently stands you can do the following on all API Entities
```php
	$oCreator = new \FernleafSystems\ApiWrappers\Freeagent\Entities\Invoices\Create();
    /** creation code parameters*/
	$oNewInvoice = $oCreator->create();
	
	if ( is_null( $oNewInvoice ) ) {
	    $sErrorMessageFromFreeAgent = $oCreator->getLastError()->getMessage();
	}
```

If you find bugs, suggestions for improvements etc., please do let us know.