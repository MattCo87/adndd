<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210701163116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_characteristic (id INT AUTO_INCREMENT NOT NULL, id_character_id INT NOT NULL, id_characteristic_id INT NOT NULL, valeur INT NOT NULL, INDEX IDX_7BC2D17532F7CB07 (id_character_id), INDEX IDX_7BC2D1752FDEB93C (id_characteristic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_characteristic ADD CONSTRAINT FK_7BC2D17532F7CB07 FOREIGN KEY (id_character_id) REFERENCES `character` (id)');
        $this->addSql('ALTER TABLE character_characteristic ADD CONSTRAINT FK_7BC2D1752FDEB93C FOREIGN KEY (id_characteristic_id) REFERENCES characteristic (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE character_characteristic');
    }
}
