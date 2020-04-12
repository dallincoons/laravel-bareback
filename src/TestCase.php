<?php

namespace Spacegrass\Bareback;

use \Illuminate\Foundation\Testing\TestCase as LaravelTestCase;

abstract class TestCase extends LaravelTestCase
{
    protected $withFramework = true;
    protected $isUsingFramework = true;

    protected function setUp(): void
    {
        if (!$this->withFramework || $this->getTestFrameworkRunner()->shouldNotUseFramework()) {
            $this->isUsingFramework = false;
            static::noFrameworkSetup();
            return;
        }

        parent::setUp();

        static::frameworkSetup();
    }

    private function noFrameworkSetup()
    {
        //
    }

    private function frameworkSetup()
    {
        //
    }

    protected function tearDown(): void
    {
        if ($this->isUsingFramework) {
            parent::tearDown();
        }
    }

    /**
     * @return TestFrameworkRunner
     */
    protected function getTestFrameworkRunner(): TestFrameworkRunner
    {
        return (TestFrameworkRunner::withOutFramework($this->getAnnotations()));
    }
}
