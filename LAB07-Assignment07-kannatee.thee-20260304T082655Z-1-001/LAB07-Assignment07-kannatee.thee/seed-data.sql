CREATE TABLE IF NOT EXISTS `students` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `student_id` VARCHAR(15) NOT NULL,
    `full_name` VARCHAR(100) NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100),
    `status` ENUM('Submitted', 'Pending', 'In Progress') DEFAULT 'Pending',
    `submitted_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `students` (`student_id`, `full_name`, `username`, `email`, `status`)
VALUES 
('6601000100', 'นายสมชาย ใจดี', 'somchai-dev', 'somchai.j@mail.com', 'Submitted'),
('6601000200', 'นางสาวสมหญิง รักเรียน', 'somying-it', 'somying.r@mail.com', 'In Progress'),
('1660704808', 'นายกานต์นที ถีเจริญ', 'kannatee-dev', 'Kannatee.thee@bumail.net', 'Submitted');