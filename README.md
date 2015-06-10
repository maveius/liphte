# Liphte

Lightweight & minimalistic HTML Builder/Generator (or maybe Template Engine) for PHP

## What is liphte ?
It's lightweight and minimalistic wrapper of html or dom builder based on [windwalker-dom](https://github.com/ventoviro/windwalker-dom) and [windwalker-html](https://github.com/ventoviro/windwalker-html), but inspired by projects [rudykocur/pyeve](https://github.com/rudykocur/pyeve) and [rudykocur/breve](https://github.com/rudykocur/breve) which is simplest way to create or generate html from controllers or others php files. 

#### Example:
```php
/** Import **/
use liphte\tags\html\Tag;

/** In your code (for example controller) **/
  $t = new Tag();

  $result = $t->table ([ 'style' => 'border: 1px solid #070;' ],
      [
          $t->tr(
              [
                  $t->td([ 'style' => 'border: 1px solid #000;' ],
                      'Column 1'
                  ),
                  $t->td([ 'style' => 'border: 1px solid #000;' ],
                      'Column 2'
                  )
              ]
          )
      ]
  );
  echo $result . "\n";
```

#### Output:
```html
<table style="border: 1px solid #070;"><tr><td style="border: 1px solid #000;">Column 1</td><td style="border: 1px solid #000;">Column 2</td></tr></table>
```

## Installing Liphte

#### Composer required:
```php
{
    "require": {
        "maveius.pl/liphte": "dev-master"
    }
}
```


1. Add required package to `composer.json`
2. Run `composer update` in your project directory.
3. Enjoy! Import library and use like in example. 

## Requirements:

- Tested on: Apache
- PHP >= 5.6(.9)
- MySQL 5+

## Changelog

- v1.0 #1: 28 Fabruary 2015:
	- Refactoring code and direcotries structure

- v0.1 : 7 February 2015:
	- Init repository & implement first concept.

## Main Developers

- [maveius](http://maveius.pl)


## Licence
MIT
