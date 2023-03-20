<?php

namespace App\Entity;

enum OrganisationState
{
    case ACTIVE;
    case RENEWAL;
    case LAPSED;
    case REVOKED;
    case ONHOLD;
    case UNKNOWN;

    public static function parse(string $state): OrganisationState
    {
        if (strtoupper($state) == "ACTIVE") {
            return OrganisationState::ACTIVE;
        } else if (strtoupper($state) == "RENEWAL") {
            return OrganisationState::RENEWAL;
        } else if (strtoupper($state) == "LAPSED") {
            return OrganisationState::LAPSED;
        } else if (strtoupper($state) == "REVOKED") {
            return OrganisationState::REVOKED;
        } else if (strtoupper($state) == "ONHOLD") {
            return OrganisationState::ONHOLD;
        }

        return OrganisationState::UNKNOWN;
    }
}