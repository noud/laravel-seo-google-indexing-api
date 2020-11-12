# Laravel SEO Google Indexing API

Inform Google Search [Indexing API](https://developers.google.com/search/apis/indexing-api/v3/quickstart) about your [Job Posting](https://developers.google.com/search/docs/data-types/job-posting) URLs.

## Requirements

* PHP 7.2+
* Laravel 5.6+

## Installation

Install the package by running this command in your terminal/cmd:
```
composer require noud/laravel-seo-google-indexing-api
```

## Configuration

Add these settings to your ```.env```.
```
GOOGLE_SERVICE_ENABLED=true
GOOGLE_SERVICE_ACCOUNT_JSON_LOCATION="/var/www/seo/config/google/google-service-account.json"
```

Please also follow the installation instructions from the google API client dependency:
https://github.com/pulkitjalan/google-apiclient

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
