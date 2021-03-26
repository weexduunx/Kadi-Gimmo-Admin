<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325211133 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE canal (id INT AUTO_INCREMENT NOT NULL, reclamation_id INT NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_E181FB592D6BA2D9 (reclamation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, reclamation_id INT NOT NULL, label VARCHAR(255) NOT NULL, INDEX IDX_55CAF7622D6BA2D9 (reclamation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, ref_rec VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE canal ADD CONSTRAINT FK_E181FB592D6BA2D9 FOREIGN KEY (reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE etat ADD CONSTRAINT FK_55CAF7622D6BA2D9 FOREIGN KEY (reclamation_id) REFERENCES reclamation (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE canal DROP FOREIGN KEY FK_E181FB592D6BA2D9');
        $this->addSql('ALTER TABLE etat DROP FOREIGN KEY FK_55CAF7622D6BA2D9');
        $this->addSql('DROP TABLE canal');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE reclamation');
    }
}
