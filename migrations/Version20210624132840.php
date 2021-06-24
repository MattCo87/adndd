<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210624132840 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE campaign (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cms (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT DEFAULT NULL, media VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice (id INT AUTO_INCREMENT NOT NULL, faces INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dice_diceset (dice_id INT NOT NULL, diceset_id INT NOT NULL, INDEX IDX_400763518604FF94 (dice_id), INDEX IDX_40076351ED959322 (diceset_id), PRIMARY KEY(dice_id, diceset_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diceset (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, id_specialty_id INT DEFAULT NULL, id_equipmenttype_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, base INT NOT NULL, damage VARCHAR(255) DEFAULT NULL, hands INT DEFAULT NULL, health INT DEFAULT NULL, ranged INT DEFAULT NULL, armor_points INT DEFAULT NULL, skill_modifyer INT DEFAULT NULL, INDEX IDX_D338D583B9F44664 (id_specialty_id), INDEX IDX_D338D583787B4181 (id_equipmenttype_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_skill (equipment_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_B764C593517FE9FE (equipment_id), INDEX IDX_B764C5935585C142 (skill_id), PRIMARY KEY(equipment_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipmenttype (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faq (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, answer VARCHAR(255) DEFAULT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, id_category_id INT NOT NULL, id_gamesystem_id INT NOT NULL, name VARCHAR(255) NOT NULL, version VARCHAR(255) NOT NULL, short_description VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_232B318CA545015 (id_category_id), INDEX IDX_232B318CEB394486 (id_gamesystem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamerules (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, path VARCHAR(255) DEFAULT NULL, INDEX IDX_3FAA850BE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamesystem (id INT AUTO_INCREMENT NOT NULL, id_diceset_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_71468498481F13F5 (id_diceset_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisation (id INT AUTO_INCREMENT NOT NULL, name LONGTEXT NOT NULL, slogan LONGTEXT DEFAULT NULL, contact_email LONGTEXT NOT NULL, telephone LONGTEXT DEFAULT NULL, adress1 LONGTEXT NOT NULL, adress2 LONGTEXT DEFAULT NULL, adress3 LONGTEXT DEFAULT NULL, city LONGTEXT NOT NULL, country LONGTEXT NOT NULL, facebook LONGTEXT DEFAULT NULL, twitter LONGTEXT DEFAULT NULL, instagram LONGTEXT DEFAULT NULL, youtube LONGTEXT DEFAULT NULL, zipcode VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, dungeonmaster_id INT NOT NULL, campaign_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, start_at DATETIME NOT NULL, status VARCHAR(255) NOT NULL, private TINYINT(1) NOT NULL, INDEX IDX_3E45C8D8499F6A47 (dungeonmaster_id), INDEX IDX_3E45C8D8F639F774 (campaign_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, base INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialty (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spell (id INT AUTO_INCREMENT NOT NULL, id_spelltype_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, effect VARCHAR(255) NOT NULL, reach INT DEFAULT NULL, zone INT DEFAULT NULL, INDEX IDX_D03FCD8DA71FE977 (id_spelltype_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE spelltype (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, id_register VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, pseudo VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, last_active DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dice_diceset ADD CONSTRAINT FK_400763518604FF94 FOREIGN KEY (dice_id) REFERENCES dice (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dice_diceset ADD CONSTRAINT FK_40076351ED959322 FOREIGN KEY (diceset_id) REFERENCES diceset (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583B9F44664 FOREIGN KEY (id_specialty_id) REFERENCES specialty (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583787B4181 FOREIGN KEY (id_equipmenttype_id) REFERENCES equipmenttype (id)');
        $this->addSql('ALTER TABLE equipment_skill ADD CONSTRAINT FK_B764C593517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE equipment_skill ADD CONSTRAINT FK_B764C5935585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CA545015 FOREIGN KEY (id_category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CEB394486 FOREIGN KEY (id_gamesystem_id) REFERENCES gamesystem (id)');
        $this->addSql('ALTER TABLE gamerules ADD CONSTRAINT FK_3FAA850BE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE gamesystem ADD CONSTRAINT FK_71468498481F13F5 FOREIGN KEY (id_diceset_id) REFERENCES diceset (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8499F6A47 FOREIGN KEY (dungeonmaster_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE scenario ADD CONSTRAINT FK_3E45C8D8F639F774 FOREIGN KEY (campaign_id) REFERENCES campaign (id)');
        $this->addSql('ALTER TABLE spell ADD CONSTRAINT FK_D03FCD8DA71FE977 FOREIGN KEY (id_spelltype_id) REFERENCES spelltype (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8F639F774');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CA545015');
        $this->addSql('ALTER TABLE dice_diceset DROP FOREIGN KEY FK_400763518604FF94');
        $this->addSql('ALTER TABLE dice_diceset DROP FOREIGN KEY FK_40076351ED959322');
        $this->addSql('ALTER TABLE gamesystem DROP FOREIGN KEY FK_71468498481F13F5');
        $this->addSql('ALTER TABLE equipment_skill DROP FOREIGN KEY FK_B764C593517FE9FE');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583787B4181');
        $this->addSql('ALTER TABLE gamerules DROP FOREIGN KEY FK_3FAA850BE48FD905');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CEB394486');
        $this->addSql('ALTER TABLE equipment_skill DROP FOREIGN KEY FK_B764C5935585C142');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583B9F44664');
        $this->addSql('ALTER TABLE spell DROP FOREIGN KEY FK_D03FCD8DA71FE977');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE scenario DROP FOREIGN KEY FK_3E45C8D8499F6A47');
        $this->addSql('DROP TABLE campaign');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE cms');
        $this->addSql('DROP TABLE dice');
        $this->addSql('DROP TABLE dice_diceset');
        $this->addSql('DROP TABLE diceset');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_skill');
        $this->addSql('DROP TABLE equipmenttype');
        $this->addSql('DROP TABLE faq');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE gamerules');
        $this->addSql('DROP TABLE gamesystem');
        $this->addSql('DROP TABLE organisation');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE specialty');
        $this->addSql('DROP TABLE spell');
        $this->addSql('DROP TABLE spelltype');
        $this->addSql('DROP TABLE user');
    }
}
