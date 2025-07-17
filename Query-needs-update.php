#ALTER TABLE `service_categories` ADD `description` TEXT NOT NULL AFTER `name`;

#ALTER TABLE services ADD slug VARCHAR(255) AFTER title;

#ALTER TABLE services
ADD COLUMN about TEXT,
ADD COLUMN images TEXT;

#ALTER TABLE services ADD COLUMN related_categories TEXT;