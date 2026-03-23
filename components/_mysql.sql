-- Create the users table
CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL UNIQUE,
  `full_name` VARCHAR(100) NOT NULL,
  `father_name` VARCHAR(100) NOT NULL,
  `mother_name` VARCHAR(100) NOT NULL,
  `date_of_birth` DATE NOT NULL,
  `password` VARCHAR(255) NOT NULL, -- Increased for password_hash()
  `address` TEXT NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- Sample Insert Statement
INSERT INTO `users` (
  `username`, 
  `full_name`, 
  `father_name`, 
  `mother_name`, 
  `date_of_birth`, 
  `password`, 
  `address`
) VALUES (
  'johndoe88', 
  'John Doe', 
  'Robert Doe', 
  'Mary Doe', 
  '1995-05-15', 
  '$2y$10$hashed_password_here', -- Always use hashed passwords
  '123 Main St, Mumbai, Maharashtra'
);