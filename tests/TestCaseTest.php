<?php

namespace Spacegrass\Bareback\Tests;

use Orchestra\Testbench\Concerns\CreatesApplication;

class TestCaseTest extends \Spacegrass\Bareback\TestCase
{
    use CreatesApplication;

    /**
 * @withoutFramework
 *
 * @test
 */
    public function framework_is_not_loaded_when_specified_by_annotation()
    {
        $this->assertNull($this->app);
    }

    /**
     * @withFramework
     *
     * @test
     */
    public function framework_is_loaded_when_specified_by_annotation()
    {
        $this->assertNotNull($this->app);
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
