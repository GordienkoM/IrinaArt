<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220417154608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, name_en VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_painting (category_id INT NOT NULL, painting_id INT NOT NULL, INDEX IDX_D1C36FDB12469DE2 (category_id), INDEX IDX_D1C36FDBB00EB939 (painting_id), PRIMARY KEY(category_id, painting_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keyword (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE keyword_painting (keyword_id INT NOT NULL, painting_id INT NOT NULL, INDEX IDX_F7D226F1115D4552 (keyword_id), INDEX IDX_F7D226F1B00EB939 (painting_id), PRIMARY KEY(keyword_id, painting_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE painting (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, name_en VARCHAR(255) NOT NULL, discription LONGTEXT DEFAULT NULL, description_en LONGTEXT DEFAULT NULL, gallery_image VARCHAR(255) NOT NULL, enable TINYINT(1) NOT NULL, has_original TINYINT(1) NOT NULL, price_original INT NOT NULL, price_original_sale INT DEFAULT NULL, price_print INT NOT NULL, price_print_sale INT DEFAULT NULL, creation_year SMALLINT DEFAULT NULL, hight NUMERIC(5, 1) NOT NULL, width NUMERIC(5, 1) NOT NULL, material VARCHAR(255) NOT NULL, alt LONGTEXT NOT NULL, alt_en LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE painting_image (id INT AUTO_INCREMENT NOT NULL, painting_id INT DEFAULT NULL, file VARCHAR(255) NOT NULL, INDEX IDX_253DB961B00EB939 (painting_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE painting_video (id INT AUTO_INCREMENT NOT NULL, painting_id INT DEFAULT NULL, file VARCHAR(255) NOT NULL, INDEX IDX_9CC76712B00EB939 (painting_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_painting ADD CONSTRAINT FK_D1C36FDB12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_painting ADD CONSTRAINT FK_D1C36FDBB00EB939 FOREIGN KEY (painting_id) REFERENCES painting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE keyword_painting ADD CONSTRAINT FK_F7D226F1115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE keyword_painting ADD CONSTRAINT FK_F7D226F1B00EB939 FOREIGN KEY (painting_id) REFERENCES painting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE painting_image ADD CONSTRAINT FK_253DB961B00EB939 FOREIGN KEY (painting_id) REFERENCES painting (id)');
        $this->addSql('ALTER TABLE painting_video ADD CONSTRAINT FK_9CC76712B00EB939 FOREIGN KEY (painting_id) REFERENCES painting (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_painting DROP FOREIGN KEY FK_D1C36FDB12469DE2');
        $this->addSql('ALTER TABLE keyword_painting DROP FOREIGN KEY FK_F7D226F1115D4552');
        $this->addSql('ALTER TABLE category_painting DROP FOREIGN KEY FK_D1C36FDBB00EB939');
        $this->addSql('ALTER TABLE keyword_painting DROP FOREIGN KEY FK_F7D226F1B00EB939');
        $this->addSql('ALTER TABLE painting_image DROP FOREIGN KEY FK_253DB961B00EB939');
        $this->addSql('ALTER TABLE painting_video DROP FOREIGN KEY FK_9CC76712B00EB939');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_painting');
        $this->addSql('DROP TABLE keyword');
        $this->addSql('DROP TABLE keyword_painting');
        $this->addSql('DROP TABLE painting');
        $this->addSql('DROP TABLE painting_image');
        $this->addSql('DROP TABLE painting_video');
        $this->addSql('DROP TABLE user');
    }
}
