-- Create the database
CREATE DATABASE shrimp_care;

-- Use the database
USE shrimp_care;

-- Create the table to store sensor data
CREATE TABLE sensor_data (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  temperature FLOAT NOT NULL,
  ph FLOAT NOT NULL,
  salinity FLOAT NOT NULL,
  dissolveOxygen FLOAT NOT NULL,
  relay INT(1) NOT NULL,
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
