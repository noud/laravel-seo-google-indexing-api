# Laraval Google Indexing API

Inform Google Search [Indexing API](https://developers.google.com/search/apis/indexing-api/v3/quickstart) about your [Job Posting](https://developers.google.com/search/docs/data-types/job-posting) URLs.

## Requirements

* PHP 7.2+
* Laravel 5.6+

## Installation

1) Install the package by running this command in your terminal/cmd:
```
composer require noud/laravel-google-indexing-api
```

2) Now follow the provider steps at [Google Api Client Wrapper](https://github.com/pulkitjalan/google-apiclient#laravel) and publish the config file.

## Configuration

1) Add these settings to your ```.env```.
```
GOOGLE_SERVICE_ENABLED=true
GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION="/var/www/seo/config/google/google-service-account.json"
```

2) Add the indexing scope to ```config/google.php```, like so:
```
    'scopes' => [
        'https://www.googleapis.com/auth/indexing'
    ],
```

## Usage

Here is a usage example:
```
<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use GoogleIndexing\Services\IndexingService;

class GoogleIndexingController extends Controller
{
    private $indexingService;

    public function __construct(IndexingService $indexingService)
    {
        $this->indexingService = $indexingService;
    }

    public function updateURL(JobPosting $jobPosting)
    {
        $this->indexingService->update($jobPosting->url);
    }

    public function removeURL(JobPosting $jobPosting)
    {
        $this->indexingService->remove($jobPosting->url);
    }

    public function statusURL(JobPosting $jobPosting)
    {
        $this->indexingService->status($jobPosting->url);
    }
}
```