<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200827171114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE crm_comments (id UUID NOT NULL, author_id UUID NOT NULL, post_id UUID NOT NULL, message VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3119DB81F675F31B ON crm_comments (author_id)');
        $this->addSql('CREATE INDEX IDX_3119DB814B89032C ON crm_comments (post_id)');
        $this->addSql('COMMENT ON COLUMN crm_comments.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN crm_comments.author_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN crm_comments.post_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE crm_posts (id UUID NOT NULL, author_id UUID DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, details VARCHAR(1000) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3454E5C2F675F31B ON crm_posts (author_id)');
        $this->addSql('COMMENT ON COLUMN crm_posts.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN crm_posts.author_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE post_tags (tag_id UUID NOT NULL, post_id UUID NOT NULL, PRIMARY KEY(tag_id, post_id))');
        $this->addSql('CREATE INDEX IDX_A6E9F32DBAD26311 ON post_tags (tag_id)');
        $this->addSql('CREATE INDEX IDX_A6E9F32D4B89032C ON post_tags (post_id)');
        $this->addSql('COMMENT ON COLUMN post_tags.tag_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN post_tags.post_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE crm_roles (id UUID NOT NULL, title VARCHAR(255) NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN crm_roles.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE user_roles (user_id UUID NOT NULL, role_id UUID NOT NULL, PRIMARY KEY(user_id, role_id))');
        $this->addSql('CREATE INDEX IDX_54FCD59FA76ED395 ON user_roles (user_id)');
        $this->addSql('CREATE INDEX IDX_54FCD59FD60322AC ON user_roles (role_id)');
        $this->addSql('COMMENT ON COLUMN user_roles.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN user_roles.role_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE crm_tags (id UUID NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN crm_tags.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE crm_users (id UUID NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, gender VARCHAR(255) NOT NULL, age INT NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN crm_users.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE crm_comments ADD CONSTRAINT FK_3119DB81F675F31B FOREIGN KEY (author_id) REFERENCES crm_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE crm_comments ADD CONSTRAINT FK_3119DB814B89032C FOREIGN KEY (post_id) REFERENCES crm_posts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE crm_posts ADD CONSTRAINT FK_3454E5C2F675F31B FOREIGN KEY (author_id) REFERENCES crm_users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post_tags ADD CONSTRAINT FK_A6E9F32DBAD26311 FOREIGN KEY (tag_id) REFERENCES crm_posts (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post_tags ADD CONSTRAINT FK_A6E9F32D4B89032C FOREIGN KEY (post_id) REFERENCES crm_tags (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59FA76ED395 FOREIGN KEY (user_id) REFERENCES crm_roles (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_roles ADD CONSTRAINT FK_54FCD59FD60322AC FOREIGN KEY (role_id) REFERENCES crm_users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE crm_comments DROP CONSTRAINT FK_3119DB814B89032C');
        $this->addSql('ALTER TABLE post_tags DROP CONSTRAINT FK_A6E9F32DBAD26311');
        $this->addSql('ALTER TABLE user_roles DROP CONSTRAINT FK_54FCD59FA76ED395');
        $this->addSql('ALTER TABLE post_tags DROP CONSTRAINT FK_A6E9F32D4B89032C');
        $this->addSql('ALTER TABLE crm_comments DROP CONSTRAINT FK_3119DB81F675F31B');
        $this->addSql('ALTER TABLE crm_posts DROP CONSTRAINT FK_3454E5C2F675F31B');
        $this->addSql('ALTER TABLE user_roles DROP CONSTRAINT FK_54FCD59FD60322AC');
        $this->addSql('DROP TABLE crm_comments');
        $this->addSql('DROP TABLE crm_posts');
        $this->addSql('DROP TABLE post_tags');
        $this->addSql('DROP TABLE crm_roles');
        $this->addSql('DROP TABLE user_roles');
        $this->addSql('DROP TABLE crm_tags');
        $this->addSql('DROP TABLE crm_users');
    }
}
