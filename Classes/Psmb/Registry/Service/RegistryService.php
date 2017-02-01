<?php
namespace Psmb\Registry\Service;

use Neos\Flow\Annotations as Flow;

/**
 * Global regsitry of misc stuff
 *
 * @Flow\Scope("singleton")
 */
class RegistryService {

    /**
     * @var array
     */
    protected $registry;

    /**
     * @param string $name
     * @return mixed
     */
    public function getRegister($name)
    {
        return isset($this->registry[$name]) ? $this->registry[$name] : null;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function setRegister($name, $value)
    {
        $this->registry[$name] = $value;
    }

}
