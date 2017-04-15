# Singleton
A trait to implement the Singleton design pattern without any dependencies.

[![Build Status](https://travis-ci.org/michaelspiss/singleton.svg?branch=master)](https://travis-ci.org/michaelspiss/singleton)
[![Coverage Status](https://coveralls.io/repos/github/michaelspiss/singleton/badge.svg?branch=master)](https://coveralls.io/github/michaelspiss/singleton?branch=master)

## Why?
There already are plenty other singleton packages, so why another one?
Simply, because most of those packages implement a factory, rather than a singleton pattern.
This and many more things bothered me about them, so here is a simple, dependency-free and fully tested
singleton.

## Installation

```
$ composer require michaelspiss/singleton
```

# Basic Usage
One line is enough to turn a class into a singleton:

```php
<?php

class StorageProvider {
    
    use MichaelSpiss\DesignPatterns\Singleton;
    
    ...
}
```

To retrieve the singleton instance, simply call
```php
$singleton = StorageProvider::getInstance();
```

## Read more
There really isn't much left to say, but if you want to know more about [constructors for singletons](https://github.com/michaelspiss/singleton/wiki/constructors) or
[forbidden actions](https://github.com/michaelspiss/singleton/wiki/forbidden-actions) you should check out the wiki!

## PHP Requirements
* PHP >= 5.4

## Author
Michael Spiss: [GitHub](https://github.com/michaelspiss)

## License
MIT