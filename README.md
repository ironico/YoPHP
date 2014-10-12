 
Send Yo with php

Example

```php 
<?php
 
require('yo.php');

// Get an API Key at dev.justyo.co
$apiKey = 'YOUR_API_KEY';

// Instanciate
$yo = new Yo($apiKey);

// Send a Yo to all your subscribers
$yo->all();

// Send a Yo  with a link to all your subscribers
$yo->all("LINK");

// Send a Yo with Link to one user
$yo->user("USERNAME","LINK"); 

// Send a Yo with Location to one user
$yo->user("USERNAME","40.8497051","14.2198926"); 

// Get number of subscribers
$count = $yo->subscribers_count();  

?>
```
 
 
