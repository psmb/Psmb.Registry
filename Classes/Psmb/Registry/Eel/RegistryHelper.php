<?php
namespace Psmb\Registry\Eel;

<<<<<<< Updated upstream
use TYPO3\Flow\Annotations as Flow;
use TYPO3\Eel\ProtectedContextAwareInterface;
=======
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;
>>>>>>> Stashed changes
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
