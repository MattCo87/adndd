<?php

namespace App\Service;

use App\Repository\OrganisationRepository;
use Twig\Extension\AbstractExtension;

class GlobalService
    extends AbstractExtension
{
    /**
     * @var $organizationRepository
     */
    private $organizationRepository;

    public function __construct(OrganisationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function getAppName()
    {
        $data = $this->organizationRepository->find(1);
        return $data ? $data->getName() : null;
    }

    public function getAppSlogan()
    {
        $data = $this->organizationRepository->find(1);
        return $data ? $data->getSlogan() : null;
    }

    public function getAppEmail()
    {
        $data = $this->organizationRepository->find(1);
        return $data ? $data->getContactEmail() : null;
    }

    public function getAppFacebook()
    {
        $data = $this->organizationRepository->find(1);
        return $data ? $data->getFacebook() : null;
    }

    public function getAppInstagram()
    {
        $data = $this->organizationRepository->find(1);
        return $data ? $data->getInstagram() : null;
    }
}