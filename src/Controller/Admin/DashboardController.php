<?php

namespace App\Controller\Admin;

use App\Entity\Achat;
use App\Entity\Bien;
use App\Entity\Candidature;
use App\Entity\Client;
use App\Entity\Projet;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Kaay Dëkk-GIMMO Admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Gestion des Achats', 'fas fa-money-check', Achat::class);
        yield MenuItem::linkToCrud('Gestion des Biens', 'fas fa-building', Bien::class);
        yield MenuItem::linkToCrud('Gestion des Clients', 'fas fa-users-cog', Client::class);
        yield MenuItem::linkToCrud('Gestion des Candidatures', 'far fa-id-badge', Candidature::class);
        yield MenuItem::linkToCrud('Gestion des Projets', 'fas fa-project-diagram', Projet::class);
    }
}
