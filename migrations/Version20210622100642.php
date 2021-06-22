<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210622100642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, id_specialty_id INT DEFAULT NULL, id_equipmenttype_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, base INT NOT NULL, damage VARCHAR(255) DEFAULT NULL, hands INT DEFAULT NULL, health INT DEFAULT NULL, ranged INT DEFAULT NULL, armor_points INT DEFAULT NULL, skill_modifyer INT DEFAULT NULL, INDEX IDX_D338D583B9F44664 (id_specialty_id), INDEX IDX_D338D583787B4181 (id_equipmenttype_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583B9F44664 FOREIGN KEY (id_specialty_id) REFERENCES specialty (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583787B4181 FOREIGN KEY (id_equipmenttype_id) REFERENCES equipmenttype (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE equipment');
    }
}
