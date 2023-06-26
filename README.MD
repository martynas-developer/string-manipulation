## Setup

```shell
composer install
```


### How to run
```shell
php src/index.php
```

### How to run ci (automatically runs PHPUnit, PHPStan and PHP_CodeSniffer)
```shell
composer ci
```

### How to run PHPUnit
```shell
./vendor/bin/phpunit tests
```

### How to run PHPStan
```shell
./vendor/bin/phpstan --level=9 analyze src
```

### How to run PHP_CodeSniffer
```shell
./vendor/bin/phpcs src
```