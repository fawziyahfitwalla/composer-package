This PHP package allows you to scrape and parse Google Search Results.Package does not use or require GoogleAPIs integration.

**Installation**

You can install the package with the composer

$ composer require fawziyahfitwalla/dmcc


**Example usage:**

$client = new SearchEngine(); 

$client->setEngine("google.ae"); 

$results = $client->search(["keyword1","keyword2"]); 


**Example output:**

The $results should is an instance of ArrayIterator with the following properties 

- keyword being searched 

- ranking (where the result was found on the search engine, the topmost result would be 0 and the last would be 50 (results per page x 5) 

- url of the page (as it appears in google search) 

- title of the page (as it appears in google search) 

- description (as it appears in google search) 

- promoted This is a boolean value indicating whether the result is an ad or organic result 
