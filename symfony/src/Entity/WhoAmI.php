<?php

namespace App\Entity;

class WhoAmI {

   private string $name;
   private string $email_verified;
   private string $email;
   private string $uuid;
   private AppMetaData $app_metadata;

    /**
     * @param string $name
     * @param string $email_verified
     * @param string $email
     * @param string $uuid
     * @param AppMetaData $app_metadata
     */
    public function __construct(string $name, string $email_verified, string $email, string $uuid, AppMetaData $app_metadata)
    {
        $this->name = $name;
        $this->email_verified = $email_verified;
        $this->email = $email;
        $this->uuid = $uuid;
        $this->app_metadata = $app_metadata;
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
    public function getEmailVerified(): string
    {
        return $this->email_verified;
    }

    /**
     * @param string $email_verified
     */
    public function setEmailVerified(string $email_verified): void
    {
        $this->email_verified = $email_verified;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return AppMetaData
     */
    public function getAppMetadata(): AppMetaData
    {
        return $this->app_metadata;
    }

    /**
     * @param AppMetaData $app_metadata
     */
    public function setAppMetadata(AppMetaData $app_metadata): void
    {
        $this->app_metadata = $app_metadata;
    }
}