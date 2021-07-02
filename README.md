![GitHub release](https://img.shields.io/github/release/idmarinas/lotgd-skeleton.svg)
![GitHub Release Date](https://img.shields.io/github/release-date/idmarinas/lotgd-skeleton.svg)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/idmarinas/lotgd-skeleton)
[![Website](https://img.shields.io/website-up-down-green-red/https/lotgd.infommo.es.svg?label=lotgd-demo)](https://lotgd.infommo.es)
[![Build in PHP](https://img.shields.io/badge/PHP-^7.3-8892BF.svg?logo=php)](http://php.net/)

![GitHub issues](https://img.shields.io/github/issues/idmarinas/lotgd-skeleton.svg)
![GitHub pull requests](https://img.shields.io/github/issues-pr/idmarinas/lotgd-skeleton.svg)
![Github commits (since latest release)](https://img.shields.io/github/commits-since/idmarinas/lotgd-skeleton/latest.svg)
![GitHub commit activity](https://img.shields.io/github/commit-activity/w/idmarinas/lotgd-skeleton.svg)
![GitHub last commit](https://img.shields.io/github/last-commit/idmarinas/lotgd-skeleton.svg)

![GitHub top language](https://img.shields.io/github/languages/top/idmarinas/lotgd-skeleton.svg)
![GitHub language count](https://img.shields.io/github/languages/count/idmarinas/lotgd-skeleton.svg)

[![Maintainability](https://api.codeclimate.com/v1/badges/4553239eac9e717f1cce/maintainability)](https://codeclimate.com/github/idmarinas/lotgd-skeleton/maintainability)
![Code Climate technical debt](https://img.shields.io/codeclimate/tech-debt/idmarinas/lotgd-skeleton?cacheSeconds=86400)

[![built with gulp](https://img.shields.io/badge/gulp-builds_this_project-eb4a4b.svg?logo=gulp)](http://gulpjs.com/)
[![built with webpack](https://img.shields.io/badge/webpack-builds_javascript-175d96.svg?logo=webpack)](https://webpack.js.org)
[![Dependabot Status](https://api.dependabot.com/badges/status?host=github&repo=idmarinas/lotgd-skeleton)](https://dependabot.com)

[![PayPal.Me - The safer, easier way to pay online!](https://img.shields.io/badge/donate-help_my_project-ffaa29.svg?logo=paypal&cacheSeconds=86400)](https://www.paypal.me/idmarinas)
[![Liberapay - Donate](https://img.shields.io/liberapay/receives/IDMarinas.svg?logo=liberapay&cacheSeconds=86400)](https://liberapay.com/IDMarinas/donate)
[![Twitter](https://img.shields.io/twitter/url/http/shields.io.svg?style=social&cacheSeconds=86400)](https://twitter.com/idmarinas)

# About

This is the template for the IDMarinas Edition core. It contains what you need to create your customization and tools to build it.
This skeleton does not include the core files, they are not necessary for the creation of your customization.

## IDMarinas Edition

Skeleton version for IDMarinas Edition: **_5.5.*_**

## First steps

-   You need have installed `npm`, `composer` and `gulp` as global commands.

    >   _Gulp_ globally, run command `npm install gulp-cli -g`
    >   _Composer_ globally see https://getcomposer.org/download/

## Create project

### Method 1

-   Run command `composer create-project idmarinas/lotgd-skeleton MyCustomLoTGD` to create a skeleton of LoTGD Core
    >   It will create a MyCustomLoTGD directory with a new LoTGD Core application inside.
-   Run command `npm install` for install all nodes packages.
    -   Note: When Fomantic Ui asks you to install, select "Skip install" and then accept everything.
    -   Not is necesary install in proyect folder.

### Method 2

-   Clone repository in your directory.
-   Run command `composer install` for install all composer packages.
-   Run command `composer lotgd:skeleton:project:create`
    -   This copy files to `_core_files/` folder for you.
    -   Olso copy files needed for commands in your `MyCustomLoTGD` directory.
-   Run command `php bin/console lotgd:regenerate:app_secret` this regenerate APP_SECRET of `.env` file.
    - Only need run one time.
-   Run command `npm install` for install all nodes packages.
    -   Note: When Fomantic Ui asks you to install, select "Skip install" and then accept everything.
    -   Not is necesary install in proyect dir.

## Upgrade project from previous version (New in version 5.2.* of Skeleton)

-   Before make any change, commit all changes in your project. 
    -   With this can see all new changes can modify as you need.

### For project of version 5.1.* and lower.

-   Need download repository and copy files to your project directory. 
    -   Revise all changes and make changes as you need.
-   Run command `composer lotgd:skeleton:project:upgrade` and wait.

### For project of version 5.2.* and higher.

-   In your composer.json search the following packages:
    -   `"idmarinas/lotgd"` and `"idmarinas/lotgd-skeleton"` Upgrade the version of these packages to the desired version, e.g. `5.2.*`
    -   Both packages must have the same major version and the same minor version, the patch version must always be an asterisk.
        -   Note: `X.Y.Z`: `X` is a major version, `Y` is a minor version, `Z` is a patch version.
        -   Note: with `*` in patch version this download los patches of packages this is only a fixed errors, not break your installation.
-   Run command `composer update`
-   Wait to finish.
-   Run command `composer lotgd:skeleton:project:upgrade` and wait.


## Prepare your custom LoTGD

-   Configure .env file with your data.
    -   Can create multiple files for separate config for enviroment:
        -   `.env.prod` contain data for production environment.
        -   `.env.dev` contain data for development environment.
        -   `.env.test` contain data for test environment.
    -   Can read comments in `.env` for know how work `.env` files.
-   Run command `php bin/console lotgd:regenerate:app_secret` this regenerate APP_SECRET of `.env` file.
    -   :warning: Only need regenerate app secret first time install LoTGD. If you already have a project in production. Change other time this can break your installation.
-   Now only need prepare all your customizations and modules

## Prepare for deployment

-   Run command `npm run lotgd-dev` for build a version for development server, located in `dist/dev/`
-   Run command `npm run lotgd-prod` for build a version for production server, located in `dist/prod/`

## Tips
-   **Composer and Package**
    -   You can add new dependencies as your project needs them, but do NOT remove any of the default ones.
    -   Note: Please do not change the versions of the dependencies.

# Other

Read [Wiki](https://github.com/idmarinas/lotgd-skeleton/wiki) for more information.
