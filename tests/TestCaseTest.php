<?php

namespace Spacegrass\Bareback\Tests;

use Orchestra\Testbench\Concerns\CreatesApplication;

class TestCaseTest extends \Spacegrass\Bareback\TestCase
{
    use CreatesApplication;

    protected $noFrameworkSetupRan = false;
    protected $frameworkSetUpRan = false;

    /**
 * @withoutFramework
 *
 * @test
 */
    public function framework_is_not_loaded_when_specified_by_annotation()
    {
        $this->assertNull($this->app);
        $this->assertTrue($this->noFrameworkSetupRan);
    }

    /**
     * @withFramework
     *
     * @test
     */
    public function framework_is_loaded_when_specified_by_annotation()
    {
        $this->assertNotNull($this->app);
        $this->assertTrue($this->frameworkSetUpRan);
    }

    protected function noFrameworkSetup()
    {
        $this->noFrameworkSetupRan = true;
    }

    protected function frameworkSetUp()
    {
        $this->frameworkSetUpRan = true;
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
    }
}
