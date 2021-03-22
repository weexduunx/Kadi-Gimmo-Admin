<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210320165910 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien ADD created_at DATE NOT NULL, ADD updated_at DATE NOT NULL, ADD deleted_at DATE NOT NULL, DROP create_at, DROP delete_at, DROP update_at');
        $this->addSql('ALTER TABLE candidature ADD debut_candidature DATE NOT NULL, ADD duree_du_contrat VARCHAR(255) NOT NULL, ADD mensualite NUMERIC(10, 3) NOT NULL, ADD nature_du_logement LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', DROP date_candidature');
        $this->addSql('ALTER TABLE client ADD cin VARCHAR(255) NOT NULL, ADD penality LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE site ADD created_at DATE NOT NULL, ADD updated_at DATE NOT NULL, ADD deleted_at DATE NOT NULL, DROP create_at, DROP delete_at, DROP update_at');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien ADD create_at DATETIME NOT NULL, ADD delete_at DATETIME NOT NULL, ADD update_at DATETIME NOT NULL, DROP created_at, DROP updated_at, DROP deleted_at');
        $this->addSql('ALTER TABLE candidature ADD date_candidature DATETIME NOT NULL, DROP debut_candidature, DROP duree_du_contrat, DROP mensualite, DROP nature_du_logement');
        $this->addSql('ALTER TABLE client DROP cin, DROP penality');
        $this->addSql('ALTER TABLE site ADD create_at DATETIME NOT NULL, ADD delete_at DATETIME NOT NULL, ADD update_at DATETIME NOT NULL, DROP created_at, DROP updated_at, DROP deleted_at');
    }
}
