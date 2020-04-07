<?php

namespace Spacegrass\Bareback;

use PHPUnit\Framework\TestCase;

class TestFrameworkRunnerTest extends TestCase
{
    /** @test */
    public function it_should_use_framework_by_default()
    {
        $runner = TestFrameworkRunner::withFramework([]);

        $this->assertTrue($runner->shouldUseFramework());
    }

    /** @test */
    public function it_should_use_framework_when_class_annotation_overrides()
    {
        $runner = TestFrameworkRunner::withOutFramework([
            'class' => [TestFrameworkRunner::USE_FRAMEWORK_ANNOTATION => '']
        ]);

        $this->assertTrue($runner->shouldUseFramework());
    }

    /** @test */
    public function it_should_use_framework_when_method_annotation_overrides()
    {
        $runner = TestFrameworkRunner::withOutFramework([
            'method' => [TestFrameworkRunner::USE_FRAMEWORK_ANNOTATION => '']
        ]);

        $this->assertTrue($runner->shouldUseFramework());
    }

    /** @test */
    public function it_should_not_use_framework_when_method_annotation_overrides()
    {
        $runner = TestFrameworkRunner::withFramework([
            'method' => [TestFrameworkRunner::NO_FRAMEWORK_ANNOTATION => '']
        ]);

        $this->assertFalse($runner->shouldUseFramework());
    }

    /** @test */
    public function it_should_not_use_framework_when_class_annotation_overrides()
    {
        $runner = TestFrameworkRunner::withFramework([
            'class' => [TestFrameworkRunner::NO_FRAMEWORK_ANNOTATION => '']
        ]);

        $this->assertFalse($runner->shouldUseFramework());
    }
}
