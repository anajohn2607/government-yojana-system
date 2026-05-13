<?php
include "config.php";

// 1. Create table for dynamic documents
$sql1 = "CREATE TABLE IF NOT EXISTS `applied_yojana_docs` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `application_id` int(11) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

if (mysqli_query($con, $sql1)) {
    echo "Document table created successfully. ";
} else {
    echo "Error creating table: " . mysqli_error($con);
}

// 2. Add reg_date to user table if not exists
$sql2 = "ALTER TABLE `user` ADD COLUMN IF NOT EXISTS `reg_date` DATETIME DEFAULT CURRENT_TIMESTAMP;";
if (mysqli_query($con, $sql2)) {
    echo "User registration date column checked/added. ";
} else {
    echo "Error adding column: " . mysqli_error($con);
}
?>