# template-interop/smarty-adapter

[smarty/smarty](https://github.com/smarty-php/smarty) adapter for [template-interop/engine](https://github.com/template-interop/engine).

## Installation

This package is installable and autoloadable via Composer.

```sh
$ composer require template-interop/smarty-adapter
```

## Usage

```php
<?php

use Interop\Template\Smarty\SmartyEngine;

$smarty = new Smarty;
$smarty->setTemplateDir(__DIR__.'/templates');
$engine = new SmartyEngine($smarty);
echo $engine->render('greeting', ['name' => 'John']);
```

You can also use it in conjunction with [template-interop/middleware](https://github.com/template-interop/middleware)
to use it in a HTTP middleware stack application.
