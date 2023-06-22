<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230622111940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, moderateur_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, comment LONGTEXT NOT NULL, publie DATE NOT NULL, note INT NOT NULL, accept TINYINT(1) NOT NULL, INDEX IDX_67F068BC20A01F78 (moderateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC20A01F78 FOREIGN KEY (moderateur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY commentaires_user_FK');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY horaire_user_FK');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY service_user_FK');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE service');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY contact_user_FK');
        $this->addSql('DROP INDEX contact_user_FK ON contact');
        $this->addSql('ALTER TABLE contact ADD telephone VARCHAR(255) NOT NULL, DROP prenom, DROP tel, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE action action VARCHAR(255) DEFAULT NULL, CHANGE ID_user lecteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63849DB9E60 FOREIGN KEY (lecteur_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_4C62E63849DB9E60 ON contact (lecteur_id)');
        $this->addSql('ALTER TABLE occasion DROP FOREIGN KEY occasion_user_FK');
        $this->addSql('DROP INDEX occasion_user_FK ON occasion');
        $this->addSql('ALTER TABLE occasion ADD motorisation VARCHAR(255) NOT NULL, DROP type_motorisation, CHANGE marque marque VARCHAR(255) NOT NULL, CHANGE modele modele VARCHAR(255) NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE kilometrage kilometrage DOUBLE PRECISION NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE ID_user author_id INT NOT NULL');
        $this->addSql('ALTER TABLE occasion ADD CONSTRAINT FK_8A66DCE5F675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_8A66DCE5F675F31B ON occasion (author_id)');
        $this->addSql('ALTER TABLE user ADD roles JSON NOT NULL, DROP role, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(250) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, commentaire LONGTEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, publie TINYINT(1) NOT NULL, note INT NOT NULL, ID_user INT DEFAULT NULL, INDEX commentaires_user_FK (ID_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE horaire (ID INT AUTO_INCREMENT NOT NULL, jour VARCHAR(10) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, debut_matin VARCHAR(10) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, fin_matin VARCHAR(10) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, debut_apresmidi VARCHAR(10) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, fin_apresmidi VARCHAR(10) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, fermeture TINYINT(1) NOT NULL, ID_user INT NOT NULL, INDEX horaire_user_FK (ID_user), PRIMARY KEY(ID)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE service (ID INT AUTO_INCREMENT NOT NULL, titre VARCHAR(10) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, description LONGTEXT CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, prix_horaire INT NOT NULL, logo VARCHAR(10) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, ID_user INT NOT NULL, INDEX service_user_FK (ID_user), PRIMARY KEY(ID)) DEFAULT CHARACTER SET latin1 COLLATE `latin1_swedish_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT commentaires_user_FK FOREIGN KEY (ID_user) REFERENCES user (ID)');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT horaire_user_FK FOREIGN KEY (ID_user) REFERENCES user (ID)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT service_user_FK FOREIGN KEY (ID_user) REFERENCES user (ID)');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC20A01F78');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63849DB9E60');
        $this->addSql('DROP INDEX IDX_4C62E63849DB9E60 ON contact');
        $this->addSql('ALTER TABLE contact ADD prenom VARCHAR(50) NOT NULL, ADD tel VARCHAR(50) NOT NULL, DROP telephone, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(50) NOT NULL, CHANGE action action VARCHAR(250) NOT NULL, CHANGE lecteur_id ID_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT contact_user_FK FOREIGN KEY (ID_user) REFERENCES user (ID)');
        $this->addSql('CREATE INDEX contact_user_FK ON contact (ID_user)');
        $this->addSql('ALTER TABLE occasion DROP FOREIGN KEY FK_8A66DCE5F675F31B');
        $this->addSql('DROP INDEX IDX_8A66DCE5F675F31B ON occasion');
        $this->addSql('ALTER TABLE occasion ADD type_motorisation VARCHAR(250) NOT NULL, DROP motorisation, CHANGE marque marque VARCHAR(50) NOT NULL, CHANGE modele modele VARCHAR(250) NOT NULL, CHANGE prix prix INT NOT NULL, CHANGE kilometrage kilometrage INT NOT NULL, CHANGE image image VARCHAR(250) NOT NULL, CHANGE author_id ID_user INT NOT NULL');
        $this->addSql('ALTER TABLE occasion ADD CONSTRAINT occasion_user_FK FOREIGN KEY (ID_user) REFERENCES user (ID)');
        $this->addSql('CREATE INDEX occasion_user_FK ON occasion (ID_user)');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON `user`');
        $this->addSql('ALTER TABLE `user` ADD role VARCHAR(10) NOT NULL, DROP roles, CHANGE email email VARCHAR(50) NOT NULL, CHANGE password password VARCHAR(250) NOT NULL, CHANGE nom nom VARCHAR(50) NOT NULL, CHANGE prenom prenom VARCHAR(50) NOT NULL');
    }
}
