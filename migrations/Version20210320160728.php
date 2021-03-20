<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210320160728 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien ADD create_at DATETIME NOT NULL, ADD delete_at DATETIME NOT NULL, ADD update_at DATETIME NOT NULL, DROP acreate_at, DROP supprimé_le, DROP màj_le');
        $this->addSql('ALTER TABLE reclamation ADD update_reclamation DATETIME NOT NULL, DROP màj_reclamation');
        $this->addSql('ALTER TABLE site ADD create_at DATETIME NOT NULL, ADD delete_at DATETIME NOT NULL, ADD update_at DATETIME NOT NULL, DROP crée_le, DROP supprimé_le, DROP màj_le');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bien ADD acreate_at DATETIME NOT NULL, ADD supprimé_le DATETIME NOT NULL, ADD màj_le DATETIME NOT NULL, DROP create_at, DROP delete_at, DROP update_at');
        $this->addSql('ALTER TABLE reclamation ADD màj_reclamation TINYINT(1) NOT NULL, DROP update_reclamation');
        $this->addSql('ALTER TABLE site ADD crée_le DATETIME NOT NULL, ADD supprimé_le DATETIME NOT NULL, ADD màj_le DATETIME NOT NULL, DROP create_at, DROP delete_at, DROP update_at');
    }
}
