UrbanAirshipBundle
==================

[![Build Status](https://travis-ci.org/stocarul/UrbanAirshipBundle.svg?branch=master)](https://travis-ci.org/stocarul/UrbanAirshipBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/bf04abfd-4f54-48a4-8f0f-13d2b1cd53a6/mini.png)](https://insight.sensiolabs.com/projects/bf04abfd-4f54-48a4-8f0f-13d2b1cd53a6)

## Installation

#### A) Add Stocarul UrbanAirship Bundle to your composer.json

```yaml
{
    "require": {
        "stocarul/urban-airship-bundle": "dev-master"
    }
}
```

#### B) Enable the bundle

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Stocarul\UrbanAirshipBundle\StocarulUrbanAirshipBundle(),
    );
}
```

#### C) Configure the bundle

```yaml
// app/config/config.yml

stocarul_urban_airship:
    app_key:             your_app_key
    app_master_secret:   your_app_master_secret
    
    logger:
        path:     %kernel.logs_dir%/urbanairship_%kernel.environment%.log
        level:    DEBUG

```
