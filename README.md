# Composer Template for WordPress Projects

This project template should provide a kickstart for managing your site dependencies with [Composer](https://getcomposer.org/).

This project consist of:

* WordPress core: [johnpbloch/wordpress-core-installer](https://github.com/johnpbloch/wordpress-core-installer)
* Repository https://wpackagist.org/ to install WordPress plugins and themes
* `composer/installers` to set custom paths for plugins and themes
* `drupal-composer/preserve-paths` to exclude paths for plugins and themes under version control

Current WordPress core: `~5.0`

### Instructions

```bash
composer install
./wp-cli.phar --path=web/ config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress
./wp-cli.phar --path=web/ db import wordpress-2019-04-06-0ea2479.sql
./wp-cli.phar --path=web/ server
```

Wordpress user: wpfloripa
Wordpress password: wpfloripa2019

### Paths

By default, wordpress core will be installed in `./web` directory. Plugins and themes will be installed in `./web/wp-content/plugins` and `./web/wp-content/themes`. Point your Apache vhost or similar to this project's `./web` directory.

### How to install WordPress plugins and themes?

With `composer require ...` you can download new dependencies to your installation.

```
cd some-dir
composer require wpackagist-plugin/wp-cfm
```

### How to manage my custom themes and plugins under version control?

1. Exclude path to your plugin or theme from .gitignore. Example for theme under `web/wp-content/themes/my-custom-theme/`:
    ```
    !web/
    web/*
    !web/wp-content/
    web/wp-content/*
    !web/wp-content/themes/
    web/wp-content/themes/*
    !web/wp-content/themes/my-custom-theme/
    ``` 
2. Add the same path to your composer.json under `extra > preserve-paths`: 
    ```
    "preserve-paths": [
      "web/wp-content/themes/custom"
    ]
    ```
3. Add your plugin/theme directory under version control
4. Run `composer install`. Composer will install WordPress core and keep your custom theme
