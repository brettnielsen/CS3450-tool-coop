# CS3450-tool-coop 

##Can be found at toolco-op.com

## Organization
#### The neighborhood tool co-op offers customers to pay a monthly fee to allow them to checkout tools to use when they need them.  The tool co-op needs a way to keep track of inventory, reservations, customers, and fees.

## Version Control
#### Use git and upload to github at https://github.com/brettnielsen/CS3450-tool-coop
#### All changes should be made branched off of master at feature/*. These branches will be pushed to master and will be required one approving vote from another team member before it is merged to master.

## Tool Stack
#### PHP, HTML, CSS, Javascript, Sqlite
#### Laravel Framework for backend
#### Laravel Blade for templating the front end
#### Homestead for local development
#### Discord for communication


## Build Instructions
#### For development, follow guide on laravel.com, also found in readME.md in laravel directory
##### Locally hosted using Homestead, found at https://laravel.com/docs/6.x/homestead
#### For production, visit production url

## Unit Testing
#### Use phpunit for unit testing
#### We will write unit tests for all public functions written. These may be simple, but must pass to allow branch to merge to master.
#### To use unit testing, login to your virtual machine, and make sure you have up to date dependencies
#### Run command 'phpunit' to start the tests
#### phpunit will inform if any tests do not pass
##### see link for more information on unit testing https://laravel.com/docs/5.8/testing

## System Testing
#### Phpunit can be used for a feature test to continue system wide testing
#### New code will be thoroughly tested before being deployed
#### System testing will be done by our team to ensure all features work as they should.
