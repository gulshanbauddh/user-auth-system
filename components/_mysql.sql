CREATE database `users`;

CREATE TABLE
  `users`.`user` (
    `sno` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `timedate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`sno`)
  ) ENGINE = InnoDB;

INSERT INTO
  `user` (`sno`, `username`, `password`, `timedate`)
VALUES
  (
    '1',
    'Gulshan Bauddh',
    'Gulshan1',
    current_timestamp()
  );

-- Table 2nd 
CREATE TABLE
  `users`.`user` (
    `sno` INT NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `fullname` VARCHAR(50) NOT NULL,
    `fathername` VARCHAR(50) NOT NULL,
    `mothername` VARCHAR(50) NOT NULL,
    `dob` DATE NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `timestump` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `address` TEXT NOT NULL,
    PRIMARY KEY (`sno`)
  ) ENGINE = InnoDB;

INSERT INTO
  `user` (
    `username`,
    `fullname`,
    `fathername`,
    `mothername`,
    `dob`,
    `password`,
    `address`
  )
VALUES
  (
    '...',
    '...',
    '...',
    '...',
    '...',
    '...',
    '...'
  );