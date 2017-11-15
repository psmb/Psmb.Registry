<?php
namespace Psmb\Registry\Service;

use Neos\Flow\Annotations as Flow;
use Neos\Utility\Arrays;

/**
 * Global registry of misc stuff
 *
 * @Flow\Scope("singleton")
 */
class RegistryService {

    /**
     * @var array
     */
    protected $registry = [];

    /**
     * @param string $path
     * @return mixed
     */
    public function getRegister(string $path)
    {
        return Arrays::getValueByPath($this->registry, $path);
    }

    /**
     * @param string $path
     * @param mixed $value
     */
    public function setRegister(string $path, $value)
    {
        $this->registry = Arrays::setValueByPath($this->registry, $path, $value);
    }
}
