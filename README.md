UrbanAirshipBundle
==================

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

stocarul_urbanairship:
    app_key: your_app_key
    app_master_secret: your_app_master_secret
```
