<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622090709 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campaign (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipmenttype (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, dungeonmaster_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, start_at DATETIME NOT NULL, status VARCHAR(255) NOT NULL, private TINYINT(1) NOT NULL, INDEX IDX_3E45C8D8499F6A47 (dungeonmaster_id), INDEX IDX_3E45C8D8F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8499F6A47 FOREIGN KEY (dungeonmaster_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8F639F774');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE equipmenttype');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('DROP TABLE specialty');
    }
}
