<?php

namespace Spacegrass\Bareback\Tests;

use Orchestra\Testbench\Concerns\CreatesApplication;
use Spacegrass\Bareback\TestCase;

class NoFrameworkByDefaultTest extends TestCase
{
    use CreatesApplication;

    protected $withFramework = false;

    /** @test */
    public function framework_is_not_loaded_by_default()
    {
        $this->assertNull($this->app);
    }

    /**
     * @withFramework
     *
     * @test
     */
    public function framework_can_be_loaded_by_overriding_default()
    {
        $this->assertNull($this->app);
    }

    protected function getEnvironmentSetUp($app)
    {
    }
}
