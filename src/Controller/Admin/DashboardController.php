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
use App\Entity\User;
use App\Entity\Ville;
use App\Repository\AchatRepository;
use App\Repository\BienRepository;
use App\Repository\ClientRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
     protected $bienRepository;
     protected $clientRepository;
     protected $achatRepository;

    public function  __construct(
         BienRepository $bienRepository,
         ClientRepository $clientRepository,
         AchatRepository $achatRepository
     )
     {
         $this->bienRepository= $bienRepository;
         $this->clientRepository= $clientRepository;
         $this->achatRepository= $achatRepository;
     }

    /**
     * @Route("/admin", name="admin")
     * @Security("is_granted('ROLE_USER')")
     */
    public function index(): Response
    {
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig',[
            'countAllBien'=> $this->bienRepository->countAllBien(),
            'countAllClient'=> $this->clientRepository->countAllClient(),
            'countAllAchat'=> $this->achatRepository->findAll(),

        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Kaay Dëkk Immo Admin')
        // you can include HTML contents too (e.g. to link to an image)
        ->setTitle('<img src="public/uploads/images/products/logoKDI.png"> Kaay Dëkk <span class="text-small">Immo.</span>')

        // the path defined in this method is passed to the Twig asset() function
        ->setFaviconPath('favicon.svg')

        // the domain used by default is 'messages'
        ->setTranslationDomain('my-custom-domain')

        // there's no need to define the "text direction" explicitly because
        // its default value is inferred dynamically from the user locale
        ->setTextDirection('ltr')

        // set this option if you prefer the page content to span the entire
        // browser width, instead of the default design which sets a max width
        ->renderContentMaximized()

        // set this option if you prefer the sidebar (which contains the main menu)
        // to be displayed as a narrow column instead of the default expanded design
        //->renderSidebarMinimized()

        // by default, all backend URLs include a signature hash. If a user changes any
        // query parameter (to "hack" the backend) the signature won't match and EasyAdmin
        // triggers an error. If this causes any issue in your backend, call this method
        // to disable this feature and remove all URL signature checks
        ->disableUrlSignatures();
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
        yield MenuItem::linkToCrud('Liste des Utilisateurs', 'fa fa-user', User::class);

    }
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
            ->setName($user->getUsername())
            ->setGravatarEmail($user->getUsername())
            ->displayUserAvatar(true)

            ;
    }


}
