<?php

namespace App\Controller;

use App\Entity\AppMetaData;
use App\Entity\Organisation;
use App\Entity\OrganisationState;
use App\Entity\WhoAmI;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
        if (array_key_exists("app_metadata", $data) && $data["app_metadata"]) {
            $organisation = null;
            if (array_key_exists("organisation", $data["app_metadata"]) && $data["app_metadata"]["organisation"]) {
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
    public function index(Request $request, LoggerInterface $logger): RedirectResponse | Response
    {
        $whoAmI = $this->whoAmI($request);

        $cookie = $request->cookies->get("bcAppSession_0", false);
        if ($cookie) {
            $logger->debug("bcAppSession IS PRESENT");
        } else {
            $logger->debug("No COOKIE");
        }

        // Need for dev only. In the real world, the who_am_i cookie will be set
        if ($request->cookies->get("bcAppSession_0", false) && ! $whoAmI) {
            // The bcAppSession_0 is set via the core front controller, the who_am_i cookie is set via the dev tunnel
            // code, so during dev we need to re-request this page.
            return new RedirectResponse($request->getRequestUri());
        }


        return $this->render('ncvo/index.html.twig', [
            'backcontroller_base' => $this->getParameter('ncvo.base'),
            'whoAmI' => $whoAmI,
        ]);
    }
}
