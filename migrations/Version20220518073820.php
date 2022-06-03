<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220518073820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article1 ADD author1_id INT NOT NULL');
        $this->addSql('ALTER TABLE article1 ADD CONSTRAINT FK_270F11D45CFF918C FOREIGN KEY (author1_id) REFERENCES user1 (id)');
        $this->addSql('CREATE INDEX IDX_270F11D45CFF918C ON article1 (author1_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article1 DROP FOREIGN KEY FK_270F11D45CFF918C');
        $this->addSql('DROP INDEX IDX_270F11D45CFF918C ON article1');
        $this->addSql('ALTER TABLE article1 DROP author1_id');
    }
}
