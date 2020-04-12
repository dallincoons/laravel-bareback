<?php

namespace Spacegrass\Bareback\Tests;

use Orchestra\Testbench\Concerns\CreatesApplication;

/**
 * @withoutFramework
 */
class NoFrameworkTest extends \Spacegrass\Bareback\TestCase
{
    use CreatesApplication;

    /**
     * @test
     */
    public function framework_is_not_loaded_by_default_when_specified_by_class_annotation()
    {
        $this->assertNull($this->app);
    }

    /**
     * @withFramework
     *
     * @test
     */
    public function framework_can_be_loaded_selectively()
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
