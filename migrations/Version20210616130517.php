<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616130517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dice (id INT AUTO_INCREMENT NOT NULL, faces INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice_diceset (dice_id INT NOT NULL, diceset_id INT NOT NULL, INDEX IDX_400763518604FF94 (dice_id), INDEX IDX_40076351ED959322 (diceset_id), PRIMARY KEY(dice_id, diceset_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dice_diceset ADD CONSTRAINT FK_400763518604FF94 FOREIGN KEY (dice_id) REFERENCES dice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dice_diceset ADD CONSTRAINT FK_40076351ED959322 FOREIGN KEY (diceset_id) REFERENCES diceset (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dice_diceset DROP FOREIGN KEY FK_400763518604FF94');
        $this->addSql('DROP TABLE dice');
        $this->addSql('DROP TABLE dice_diceset');
    }
}
