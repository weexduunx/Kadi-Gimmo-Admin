<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210320121827 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE achat (id INT AUTO_INCREMENT NOT NULL, bien_id INT NOT NULL, client_id INT NOT NULL, mode VARCHAR(255) NOT NULL, INDEX IDX_26A98456BD95B80F (bien_id), INDEX IDX_26A9845619EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bien (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, code_bien VARCHAR(255) NOT NULL, crée_le DATETIME NOT NULL, supprimé_le DATETIME NOT NULL, prix NUMERIC(10, 0) NOT NULL, superficie INT NOT NULL, titre TINYINT(1) NOT NULL, màj_le DATETIME NOT NULL, INDEX IDX_45EDC386C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE canal (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, bien_id INT NOT NULL, client_id INT NOT NULL, date_candidature DATETIME NOT NULL, INDEX IDX_E33BD3B8BD95B80F (bien_id), INDEX IDX_E33BD3B819EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, profession_id INT NOT NULL, tel VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, code_client VARCHAR(255) NOT NULL, INDEX IDX_C7440455A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, site_id INT NOT NULL, code_projet VARCHAR(255) NOT NULL, crée_le DATETIME NOT NULL, supprimé_le DATETIME NOT NULL, nom VARCHAR(255) NOT NULL, màj_le DATETIME NOT NULL, INDEX IDX_50159CA9F6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, canal_id INT NOT NULL, etat_id INT NOT NULL, client_id INT NOT NULL, commentaire VARCHAR(255) NOT NULL, fichier VARCHAR(255) NOT NULL, mode INT NOT NULL, màj_reclamation TINYINT(1) NOT NULL, INDEX IDX_CE60640419EB6921 (client_id), INDEX IDX_CE606404D5E86FF (etat_id), INDEX IDX_CE60640468DB5B2E (canal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, code_site VARCHAR(255) NOT NULL, crée_le DATETIME NOT NULL, supprimé_le DATETIME NOT NULL, nom VARCHAR(255) NOT NULL, màj_le DATETIME NOT NULL, INDEX IDX_694309E4A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_bien (id INT AUTO_INCREMENT NOT NULL, bien_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_92E2068EBD95B80F (bien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C398260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A98456BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE achat ADD CONSTRAINT FK_26A9845619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE bien ADD CONSTRAINT FK_45EDC386C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B8BD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE candidature ADD CONSTRAINT FK_E33BD3B819EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404D5E86FF FOREIGN KEY (etat_id) REFERENCES etat (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640468DB5B2E FOREIGN KEY (canal_id) REFERENCES canal (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE type_bien ADD CONSTRAINT FK_92E2068EBD95B80F FOREIGN KEY (bien_id) REFERENCES bien (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C398260155 FOREIGN KEY (region_id) REFERENCES region (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A98456BD95B80F');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B8BD95B80F');
        $this->addSql('ALTER TABLE type_bien DROP FOREIGN KEY FK_92E2068EBD95B80F');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640468DB5B2E');
        $this->addSql('ALTER TABLE achat DROP FOREIGN KEY FK_26A9845619EB6921');
        $this->addSql('ALTER TABLE candidature DROP FOREIGN KEY FK_E33BD3B819EB6921');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640419EB6921');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404D5E86FF');
        $this->addSql('ALTER TABLE bien DROP FOREIGN KEY FK_45EDC386C18272');
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C398260155');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9F6BD1646');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A73F0036');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E4A73F0036');
        $this->addSql('DROP TABLE achat');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE canal');
        $this->addSql('DROP TABLE candidature');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE type_bien');
        $this->addSql('DROP TABLE ville');
    }
}
