<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251023145617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author CHANGE username username VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(50) NOT NULL, CHANGE nb_books nb_books INT DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD author_id INT DEFAULT NULL, DROP category, CHANGE title title VARCHAR(50) NOT NULL, CHANGE published published TINYINT(1) NOT NULL, CHANGE publish_date publish_date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE book ADD CONSTRAINT FK_CBE5A331F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_CBE5A331F675F31B ON book (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author CHANGE username username VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE nb_books nb_books INT NOT NULL');
        $this->addSql('ALTER TABLE book DROP FOREIGN KEY FK_CBE5A331F675F31B');
        $this->addSql('DROP INDEX IDX_CBE5A331F675F31B ON book');
        $this->addSql('ALTER TABLE book ADD category VARCHAR(255) DEFAULT NULL, DROP author_id, CHANGE title title VARCHAR(255) NOT NULL, CHANGE published published INT NOT NULL, CHANGE publish_date publish_date VARCHAR(255) DEFAULT NULL');
    }
}
