<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210325133134 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD achat_id INT NOT NULL, ADD candidature_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455FE95D117 FOREIGN KEY (achat_id) REFERENCES achat (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455B6121583 FOREIGN KEY (candidature_id) REFERENCES candidature (id)');
        $this->addSql('CREATE INDEX IDX_C7440455FE95D117 ON client (achat_id)');
        $this->addSql('CREATE INDEX IDX_C7440455B6121583 ON client (candidature_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455FE95D117');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455B6121583');
        $this->addSql('DROP INDEX IDX_C7440455FE95D117 ON client');
        $this->addSql('DROP INDEX IDX_C7440455B6121583 ON client');
        $this->addSql('ALTER TABLE client DROP achat_id, DROP candidature_id');
    }
}
