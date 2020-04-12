<?php

namespace Spacegrass\Bareback\Tests;

use Orchestra\Testbench\Concerns\CreatesApplication;

/**
 * @withFramework
 */
class WithFrameworkTest extends \Spacegrass\Bareback\TestCase
{
    use CreatesApplication;

    /**
     * @test
     */
    public function framework_is_loaded_by_default_when_specified_by_class_annotation()
    {
        $this->assertNotNull($this->app);
    }

    /**
     * @withoutFramework
     *
     * @test
     */
    public function framework_can_be_not_loaded_selectively()
    {
        $this->assertNull($this->app);
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
