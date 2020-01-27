<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200127080755 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE todo_item ADD list_id INT NOT NULL');
        $this->addSql('ALTER TABLE todo_item ADD CONSTRAINT FK_40CA43013DAE168B FOREIGN KEY (list_id) REFERENCES todo_list (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_40CA43013DAE168B ON todo_item (list_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE todo_item DROP FOREIGN KEY FK_40CA43013DAE168B');
        $this->addSql('DROP INDEX IDX_40CA43013DAE168B ON todo_item');
        $this->addSql('ALTER TABLE todo_item DROP list_id');
    }
}
