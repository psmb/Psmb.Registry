<?php
namespace Psmb\Registry\Eel;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;
use Psmb\Registry\Service\RegistryService;

/**
 * Get and set things on global registry
 */
class RegistryHelper implements ProtectedContextAwareInterface
{
    /**
     * @Flow\Inject
     * @var RegistryService
     */
    protected $registryService;

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->registryService->getRegister($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->registryService->setRegister($key, $value);
    }

    /**
     * Atomically sets key to value and returns the old value stored at key.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function getset(string $key, $value)
    {
        $previousValue = $this->registryService->getRegister($key);
        $this->registryService->setRegister($key, $value);
        return $previousValue;
    }

    /**
     * @param $key
     * @return int
     */
    public function increment($key)
    {
        $currentValue = (int)$this->registryService->getRegister($key);
        $nextValue = $currentValue < PHP_INT_MAX ? ++$currentValue : $currentValue;
        $this->registryService->setRegister($key, $nextValue);
        return $nextValue;
    }

    /**
     * @param $key
     * @return int
     */
    public function decrement($key)
    {
        $currentValue = (int)$this->registryService->getRegister($key);
        $nextValue = $currentValue > 1 ? --$currentValue : 0;
        $this->registryService->setRegister($key, $nextValue);
        return $nextValue;
    }

    /**
     * All methods are considered safe
     *
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
