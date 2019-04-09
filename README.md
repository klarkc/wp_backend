# WordPress Backend Template

This project template should provide a kickstart for managing your site dependencies with [Composer](https://getcomposer.org/). [Thanks Wodby](https://github.com/wodby/wordpress-composer).

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

### How to install WordPress third party plugins and themes?

With `composer require ...` you can download new dependencies to your installation.

```
cd some-dir
composer require wpackagist-plugin/wp-cfm
```

### How to manage my custom themes and plugins under version control?

1. Init a composer project in packages directory (set type to wordpress-plugin or wordpress-theme)
2. Add a local (type path) repository in `repositories` option of the root `composer.json`.
4. Run `composer require vendor/your-package`.
