<?php

namespace App\Controller;

use App\Entity\AdminCRUD;
use App\Entity\Cours;
use App\Entity\Langages;
use App\Entity\User;
use App\Form\AdminCRUDType;
use App\Form\CoursFormType;
use App\Form\LangageFormType;
use App\Form\RegistrationFormType;
use App\Repository\CoursRepository;
use App\Repository\LangagesRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/crud')]
class AdminCRUDController extends AbstractController
{
    #[Route('/', name: 'app_admin_crud', methods: ['GET'])]
    public function index(UserRepository $userRepository, LangagesRepository $langagesRepository, CoursRepository $coursRepository): Response
    {
        return $this->render('admin_crud/index.html.twig', [
            'users' => $userRepository->findAll(),
            'langages' => $langagesRepository->findAll(),
            'cours' => $coursRepository->findAll(),
        ]);
    }

    #[Route('/{category}', name: 'app_admin_crud_category', methods: ['GET'])]
    public function handleCategory(string $category, UserRepository $userRepository, LangagesRepository $langagesRepository, CoursRepository $coursRepository): Response
    {
        $arr = array("typeModule" => $category);
        
        switch ($category) {
            case "users":
                $arr['objects'] = $userRepository->findAll();
                
                break;
            case "cours":
                $arr['objects'] = $coursRepository->findAll();
                // dd($coursRepository->findAll());
                break;
            case "langages":
                $arr['objects'] = $langagesRepository->findAll();
                
                break;
        }

        return $this->render('admin_crud/category.html.twig', $arr);
    }

    #[Route('/{category}/new', name: 'app_admin_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, string $category): Response
    {

        switch ($category) {
            case "users":
                $formType = new User();
                $form = $this->createForm(RegistrationFormType::class, $formType);
                break;
            case "cours":
                $formType = new Cours();
                $form = $this->createForm(CoursFormType::class, $formType);
                break;
            case "langages":
                $formType = new Langages();
                $form = $this->createForm(LangageFormType::class, $formType);
        }

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($formType);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_crud', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_crud/new.html.twig', [
            'typeModule' => $category,
            'admin_crud' => $formType,
            'form' => $form,
        ]);
    }

    #[Route('/{category}/{element}', name: 'app_admin_crud_show', methods: ['GET'])]
    public function show(array $element): Response
    {
        return $this->render('admin_crud/show.html.twig', [
            'elements' => $element,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_c_r_u_d_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AdminCRUD $adminCRUD, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AdminCRUDType::class, $adminCRUD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_c_r_u_d_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin_crud/edit.html.twig', [
            'admin_c_r_u_d' => $adminCRUD,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_c_r_u_d_delete', methods: ['POST'])]
    public function delete(Request $request, AdminCRUD $adminCRUD, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $adminCRUD->getId(), $request->request->get('_token'))) {
            $entityManager->remove($adminCRUD);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_c_r_u_d_index', [], Response::HTTP_SEE_OTHER);
    }
}
