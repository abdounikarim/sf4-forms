<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190906152153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE article_reference');
        $this->addSql('ALTER TABLE tag CHANGE slug slug VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE user DROP agreed_terms_at');
        $this->addSql('ALTER TABLE article DROP location, DROP specific_location_name');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE article_reference (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, filename VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, mime_type VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, original_filename VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, position INT NOT NULL, INDEX IDX_749619377294869C (article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article_reference ADD CONSTRAINT FK_749619377294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE article ADD location VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD specific_location_name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE tag CHANGE slug slug VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user ADD agreed_terms_at DATETIME NOT NULL');
    }
}
