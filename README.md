# WayaWaya API PHP SDK

## Installation
### Composer
```bash
composer require osen/wayawaya
```

### Manual
```php
require_once('path/to/autoload.php');
```

## Usage
### Instantiate class

```php

<?php

use Osen\Waya\Kplc;

Kplc::configure($credentials);
```

### Available Services
#### Kenya Power Tokens

```php

try {
  $request = Kplc::tokens($account);
} catch (\Throwable $th) {
  return $th->getMessage();
}
```


#### Kenya Power Postpay

```php

try {
  $request = Kplc::postpay($account);
} catch (\Throwable $th) {
  return $th->getMessage();
}
```

