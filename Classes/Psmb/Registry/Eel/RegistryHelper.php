<?php
namespace Psmb\Registry\Eel;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Eel\ProtectedContextAwareInterface;
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
    public function get($key) {
        return $this->registryService->getRegister($key);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value) {
        $this->registryService->setRegister($key, $value);
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
