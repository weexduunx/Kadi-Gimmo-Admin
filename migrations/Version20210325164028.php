<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325164028 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client_ville (client_id INT NOT NULL, ville_id INT NOT NULL, INDEX IDX_E0AE457419EB6921 (client_id), INDEX IDX_E0AE4574A73F0036 (ville_id), PRIMARY KEY(client_id, ville_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client_ville ADD CONSTRAINT FK_E0AE457419EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_ville ADD CONSTRAINT FK_E0AE4574A73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client DROP ville_id');
        $this->addSql('ALTER TABLE ville DROP client_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE client_ville');
        $this->addSql('ALTER TABLE client ADD ville_id INT NOT NULL');
        $this->addSql('ALTER TABLE ville ADD client_id INT NOT NULL');
    }
}
