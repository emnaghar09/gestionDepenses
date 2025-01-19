<?php

namespace App\Controller;

use App\Service\DepenseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionDepenseController extends AbstractController
{
    private $depenseService;
    public function __construct(DepenseService $depenseService)
    {
        $this->depenseService = $depenseService;
    }



    /**
     * @Route("/", name="app_depenses", methods={"GET"})
     */
    public function getAll(): Response
    {
        $depenses = $this->depenseService->getAllDepenses();
        return $this->render('gestion_depense/index.html.twig', [
            'depenses' => $depenses
        ]);
    }
    /**
     * @Route("/depense/new", name="depense_new", methods={"GET"})
     */
    public function new(): Response
    {
        return $this->render('gestion_depense/new.html.twig');
    }
    /**
     * @Route("/depense/new", name="depense_create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $data = $request->request->all();
        $this->depenseService->createDepense($data);

        return $this->redirectToRoute('app_depenses');
    }

    /**
     * @Route("/depense/edit/{id}", name="depense_edit", methods={"GET", "POST"})
     */
    public function update(Request $request, $id): Response
    {
        $depense = $this->depenseService->findDepenseById($id);

        if (!$depense) {
            throw $this->createNotFoundException('Dépense non trouvée');
        }

        if ($request->isMethod('POST')) {
            $data = $request->request->all();
            $this->depenseService->updateDepense($depense, $data);

            return $this->redirectToRoute('app_depenses');
        }

        return $this->render('gestion_depense/edit.html.twig', [
            'depense' => $depense
        ]);
    }

    /**
     * @Route("/depense/delete/{id}", name="depense_delete", methods={"DELETE"})
     */
    public function delete($id): Response
    {
        $depense = $this->depenseService->findDepenseById($id);

        if (!$depense) {
            throw $this->createNotFoundException('Dépense non trouvée');
        }

        $this->depenseService->deleteDepense($depense);

        return $this->json(['message' => 'Dépense supprimée avec succès']);
    }
}
