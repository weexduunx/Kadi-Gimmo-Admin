<?php

namespace App\Controller\Admin;

use App\Entity\Achat;
use App\Entity\Bien;
use App\Entity\Canal;
use App\Entity\Candidature;
use App\Entity\Client;
use App\Entity\Etat;
use App\Entity\Projet;
use App\Entity\Reclamation;
use App\Entity\Region;
use App\Entity\Site;
use App\Entity\TypeDeBien;
use App\Entity\Ville;
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
            ->setTitle('Kaay Dëkk Immo Admin');
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Liste des Clients', 'fas fa-clipboard-list', Client::class);
        yield MenuItem::linkToCrud('Liste des Achats', 'fas fa-clipboard-list', Achat::class);
        yield MenuItem::linkToCrud('Gestion des Biens', 'fas fa-building', Bien::class);
        yield MenuItem::linkToCrud('Liste des Candidatures', 'fas fa-clipboard-list', Candidature::class);
        yield MenuItem::linkToCrud('Liste des Types de bien', 'fas fa-clipboard-list', TypeDeBien::class);
        yield MenuItem::linkToCrud('Liste des Projets', 'fas fa-clipboard-list', Projet::class);
        yield MenuItem::linkToCrud('Liste des Sites', 'fas fa-clipboard-list', Site::class);
        yield MenuItem::linkToCrud('Liste des Villes', 'fas fa-clipboard-list', Ville::class);
        yield MenuItem::linkToCrud('Liste des Regions', 'fas fa-clipboard-list', Region::class);
        yield MenuItem::linkToCrud('Liste des Réclamations', 'fas fa-clipboard-list', Reclamation::class);
        yield MenuItem::linkToCrud('Liste des Etats', 'fas fa-clipboard-list', Etat::class);
        yield MenuItem::linkToCrud('Liste des Canaux', 'fas fa-clipboard-list', Canal::class);

    }
}
