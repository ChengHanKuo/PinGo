CREATE TABLE `content` (
   `id` INT NOT NULL ,
   `content` TEXT NOT NULL
) ENGINE = MYISAM ;
CREATE TABLE `ratings` (
   `rating` VARCHAR ( 7 ) NOT NULL ,
   `id` INT NOT NULL ,
   `ip` VARCHAR ( 50 ) NOT NULL
) ENGINE = MYISAM ;
INSERT INTO content VALUES ('1', 'Demo'), ('2', 'wcetdesigns.com');