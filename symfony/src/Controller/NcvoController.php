<?php

namespace App\Controller;

use App\Entity\AppMetaData;
use App\Entity\Organisation;
use App\Entity\OrganisationState;
use App\Entity\WhoAmI;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\Exception\TimeoutException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class NcvoController extends AbstractController
{

    public static function whoAmI(Request $request): WhoAmI|bool
    {
        $cookie = $request->cookies->get("ncvo_who_am_i", false);

        if (!$cookie) {
            return false;
        }

        $data = json_decode($cookie, true);

        if (!$data) {
            return false;
        }

        $appMetaData = null;
        if (array_key_exists("app_metadata", $data)) {
            $organisation = null;
            if (array_key_exists("organisation", $data["app_metadata"])) {
                $organisation = new Organisation(
                    $data["app_metadata"]["organisation"]["name"],
                    $data["app_metadata"]["organisation"]["id"],
                    $data["app_metadata"]["organisation"]["ncvo_isMembershipOrganisation"] == "true",
                    OrganisationState::parse($data["app_metadata"]["organisation"]["ncvo_organisationState"]),
                );
            }
            $appMetaData = new AppMetaData(
                $data["app_metadata"]['ncvo_organisationManager'] == true,
                $organisation,
            );
        }

        return new WhoAmI(
            $data["name"],
            $data["email_verified"],
            $data["email"],
            $data["uuid"],
            $appMetaData,
        );
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/', name: 'app_ncvo')]
    public function index(Request $request, LoggerInterface $logger): Response
    {
        $whoAmI = $this->whoAmI($request);

        return $this->render('ncvo/index.html.twig', [
            'backcontroller_base' => $this->getParameter('ncvo.base'),
            'whoAmI' => $whoAmI,
        ]);
    }
}
