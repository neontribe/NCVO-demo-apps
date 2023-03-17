<?php

namespace App\Entity;

class AppMetaData
{
   private bool $managerFlag;
   private Organisation $organisation;

    /**
     * @return bool
     */
    public function isManagerFlag(): bool
    {
        return $this->managerFlag;
    }

    /**
     * @param bool $managerFlag
     */
    public function setManagerFlag(bool $managerFlag): void
    {
        $this->managerFlag = $managerFlag;
    }

    /**
     * @return Organisation
     */
    public function getOrganisation(): Organisation
    {
        return $this->organisation;
    }

    /**
     * @param Organisation $organisation
     */
    public function setOrganisation(Organisation $organisation): void
    {
        $this->organisation = $organisation;
    }

    /**
     * @param bool $managerFlag
     * @param Organisation $organisation
     */
    public function __construct(bool $managerFlag, Organisation $organisation)
    {
        $this->managerFlag = $managerFlag;
        $this->organisation = $organisation;
    }
}