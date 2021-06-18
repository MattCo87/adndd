<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210618133706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice (id INT AUTO_INCREMENT NOT NULL, faces INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice_diceset (dice_id INT NOT NULL, diceset_id INT NOT NULL, INDEX IDX_400763518604FF94 (dice_id), INDEX IDX_40076351ED959322 (diceset_id), PRIMARY KEY(dice_id, diceset_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diceset (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, answer VARCHAR(255) DEFAULT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, id_category_id INT NOT NULL, id_gamesystem_id INT NOT NULL, name VARCHAR(255) NOT NULL, version VARCHAR(255) NOT NULL, short_description VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_232B318CA545015 (id_category_id), INDEX IDX_232B318CEB394486 (id_gamesystem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamerules (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) DEFAULT NULL, INDEX IDX_3FAA850BE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamesystem (id INT AUTO_INCREMENT NOT NULL, id_diceset_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_71468498481F13F5 (id_diceset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, id_register VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, pseudo VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, last_active DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dice_diceset ADD CONSTRAINT FK_400763518604FF94 FOREIGN KEY (dice_id) REFERENCES dice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dice_diceset ADD CONSTRAINT FK_40076351ED959322 FOREIGN KEY (diceset_id) REFERENCES diceset (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CEB394486 FOREIGN KEY (id_gamesystem_id) REFERENCES gamesystem (id)');
        $this->addSql('ALTER TABLE gamerules ADD CONSTRAINT FK_3FAA850BE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE gamesystem ADD CONSTRAINT FK_71468498481F13F5 FOREIGN KEY (id_diceset_id) REFERENCES diceset (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CA545015');
        $this->addSql('ALTER TABLE dice_diceset DROP FOREIGN KEY FK_400763518604FF94');
        $this->addSql('ALTER TABLE dice_diceset DROP FOREIGN KEY FK_40076351ED959322');
        $this->addSql('ALTER TABLE gamesystem DROP FOREIGN KEY FK_71468498481F13F5');
        $this->addSql('ALTER TABLE gamerules DROP FOREIGN KEY FK_3FAA850BE48FD905');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CEB394486');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE dice');
        $this->addSql('DROP TABLE dice_diceset');
        $this->addSql('DROP TABLE diceset');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE gamerules');
        $this->addSql('DROP TABLE gamesystem');
        $this->addSql('DROP TABLE user');
    }
}
