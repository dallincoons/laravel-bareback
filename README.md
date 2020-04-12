![Bareback - selectively turn off Laravel in your test suite](bareback-cover.png)

# Bareback

Bareback is a Laravel package that makes it easy to selectively choose which tests run with the framework loaded.

### Why would I want to run tests without the framework?

Running tests without loading the Laravel framework is much faster, typically anywhere from 50% to 70%.
It's often a good idea to try and implement core business logic with as little dependencies as possible. However, creating an entire test suite 
for an application with no with no framework dependencies isn't practical or pragmatic. This package allows you to switch off the framework
when testing core business logic in "unit" tests, and switch it on when running end to end or "integration" tests.

## Installation

```
composer require "spacegrass/bareback"
```

## Usage
First you need to extend the base TestCase, which in turn extends the Laravel TestCase:

```
class TestCase extends \Spacegrass\Bareback\TestCase 
{

}
``` 

To stop the framework from loading, simply add the `@withoutFramework` annotation to your test method:
```
/**
* @withoutFramework
*/
public function test_something_quickly()
{

}
```

or alternatively, add the annotation to the class itself, and every test method therein will not load the framework by default. 
If you would like to turn on the framework, add the `@withFramework` annotation to any test method, and it that test method alone
will load the framework.
```
/**
* @withoutFramework
*/
class FastTests extends TestCase 
{
    public function test_something_without_framework_by_default()
    {
    
    }
    
    /**
    * @withFramework
    */
    public function test_something_with_the_framework_for_some_reason()
    {
    
    }
}
```

You can add set up specifically for when the framework is loaded or not loaded by adding the `noFrameworkSetup` and `frameworkSetup` methods to 
your test case.

```
 class SometimesRunningWithFrameworkTestCase {
 
    public function noFrameworkSetup() 
    {
        //register fake repositories or mock something out, for example
    }
    
    public function frameworkSetup()
    {
        //perhaps add something specific to your database migrations or anything else
        //the is dependent on the framework
    }
```

If you wish to run all your tests without the framework by default, and force an 'opt-in' approach when running tests with the framework,
simply add the `withFramework` property:

```
class RunTestsWithoutFrameworkByDefaultTestCase {

    protected $withFramework = false;
    
    public function test_runs_with_out_framework()
    {
    
    }
    
    /**
    * @withFramework
    */
    public function test_requires_opt_in_to_use_framework
    {
        
    }
}
``
