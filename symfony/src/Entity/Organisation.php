<?php

namespace App\Entity;

class Organisation
{
   private string $name;
   private string $id;
   private bool $membershipOrganisation;
   private OrganisationState $organisationState;

    /**
     * @param string $name
     * @param string $id
     * @param bool $membershipOrganisation
     * @param OrganisationState $organisationState
     */
    public function __construct(string $name, string $id, bool $membershipOrganisation, OrganisationState $organisationState)
    {
        $this->name = $name;
        $this->id = $id;
        $this->membershipOrganisation = $membershipOrganisation;
        $this->organisationState = $organisationState;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isMembershipOrganisation(): bool
    {
        return $this->membershipOrganisation;
    }

    /**
     * @param bool $membershipOrganisation
     */
    public function setMembershipOrganisation(bool $membershipOrganisation): void
    {
        $this->membershipOrganisation = $membershipOrganisation;
    }

    /**
     * @return OrganisationState
     */
    public function getOrganisationState(): OrganisationState
    {
        return $this->organisationState;
    }

    /**
     * @param OrganisationState $organisationState
     */
    public function setOrganisationState(OrganisationState $organisationState): void
    {
        $this->organisationState = $organisationState;
    }
}