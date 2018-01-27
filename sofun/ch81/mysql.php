CREATE TABLE `content` (
   `id` INT NOT NULL ,
   `content` TEXT NOT NULL
) ENGINE = MYISAM;
CREATE TABLE `ratings` (
   `rating_id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
   `rating` VARCHAR (10) NOT NULL ,
   `id` INT NOT NULL ,
   `ip` VARCHAR (50) NOT NULL
) ENGINE = MYISAM;
INSERT INTO content VALUES ('1', 'Demo 1'), ('2', 'Demo 2'), ('3', 'Demo 3'), ('4', 'Demo 4');