<?php

namespace App\Service;

use App\Repository\OrganisationRepository;
use Twig\Extension\AbstractExtension;

class GlobalService
    extends AbstractExtension
{
    /**
     * @var $organizationData
     */
    private $organizationData;

    public function __construct(OrganisationRepository $organizationRepository)
    {
        $this->organizationData = $organizationRepository->find(1);
    }

    public function getAppName()
    {
        return $this->organizationData ? $this->organizationData->getName() : null;
    }

    public function getAppSlogan()
    {
        return $this->organizationData ? $this->organizationData->getSlogan() : null;
    }

    public function getAppEmail()
    {
        return $this->organizationData ? $this->organizationData->getContactEmail() : null;
    }

    public function getAppFacebook()
    {
        return $this->organizationData ? $this->organizationData->getFacebook() : null;
    }

    public function getAppInstagram()
    {
        return $this->organizationData ? $this->organizationData->getInstagram() : null;
    }
}