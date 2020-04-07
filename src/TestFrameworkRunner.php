<?php

namespace Spacegrass\Bareback;

use Illuminate\Support\Arr;

class TestFrameworkRunner
{
    /**
     * @var array
     */
    private $annotations;

    const USE_FRAMEWORK_ANNOTATION = 'withFramework';
    const NO_FRAMEWORK_ANNOTATION = 'withoutFramework';

    /**
     * @var bool
     */
    private $useFramework = false;

    /**
     * @param array $annotations
     * @param bool $useFramework
     */
    public function __construct(array $annotations, bool $useFramework = false)
    {
        $this->useFramework = $useFramework;
        $this->annotations = $annotations;
    }

    /**
     * @param array $annotations
     * @return TestFrameworkRunner
     */
    public static function withFramework(array $annotations)
    {
        return new self($annotations, true);
    }

    /**
     * @param array $annotations
     * @return TestFrameworkRunner
     */
    public static function withOutFramework(array $annotations)
    {
        return new self($annotations);
    }

    /**
     * @return bool
     */
    public function shouldNotUseFramework(): bool
    {
        return !$this->shouldUseFramework();
    }

    /**
     * @return bool
     */
    public function shouldUseFramework(): bool
    {
        return (!$this->requiresNoFramework()) || $this->requiresFramework();
    }

    /**
     * @return bool
     */
    public function requiresFramework(): bool
    {
        if ($this->methodRequiresFramework()) {
            return true;
        }

        return $this->methodRequiresFramework();
    }

    /**
     * @return bool
     */
    protected function classRequiresFramework(): bool
    {
        $annotations = array_keys(Arr::get($this->annotations, 'class', []));

        return in_array(self::USE_FRAMEWORK_ANNOTATION, $annotations);
    }

    /**
     * @return bool
     */
    private function requiresNoFramework(): bool
    {
        return $this->classRequiresNoFramework()
            || $this->methodRequiresNoFramework();
    }

    /**
     * @return bool
     */
    private function classRequiresNoFramework(): bool
    {
        $annotation = array_keys(Arr::get($this->annotations, 'class', []));

        return in_array(self::NO_FRAMEWORK_ANNOTATION, $annotation);
    }

    /**
     * @return bool
     */
    private function methodRequiresNoFramework(): bool
    {
        $annotation = array_keys(Arr::get($this->annotations, 'method', []));

        return in_array(self::NO_FRAMEWORK_ANNOTATION, $annotation);
    }

    /**
     * @return bool
     */
    private function methodRequiresFramework(): bool
    {
        $annotation = array_keys(Arr::get($this->annotations, 'method', []));

        return in_array(self::USE_FRAMEWORK_ANNOTATION, $annotation);
    }
}
