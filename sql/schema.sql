
DROP DATABASE IF EXISTS weather;

CREATE DATABASE IF NOT EXISTS weather
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_polish_ci;

USE weather;

DROP TABLE IF EXISTS temperature;
DROP TABLE IF EXISTS pressure;
DROP TABLE IF EXISTS sensor;
DROP TABLE IF EXISTS api_manager;

/**********************************************************************************************************************/
CREATE TABLE temperature (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sensor_id VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NULL DEFAULT NULL,
  data DECIMAL (5,2) NOT NULL,
  created_at DATETIME
)
DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci
ENGINE = MYISAM;

/**********************************************************************************************************************/
CREATE TABLE pressure (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sensor_id VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NULL DEFAULT NULL,
  data DECIMAL (5,2) NOT NULL,
  created_at DATETIME
)
DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci
ENGINE = MYISAM;

/**********************************************************************************************************************/
CREATE TABLE sensor (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  sensor_id VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NULL DEFAULT NULL,
  name VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NULL DEFAULT NULL,
  geolat DECIMAL (10,6) NOT NULL,
  geolng DECIMAL (10,6) NOT NULL
)
DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci
ENGINE = MYISAM;

/**********************************************************************************************************************/
CREATE TABLE api_manager (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  api_key VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NULL DEFAULT NULL,
  name VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NULL DEFAULT NULL,
  description TEXT CHARACTER SET utf8 COLLATE utf8_polish_ci NULL DEFAULT NULL
)
DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci
ENGINE = MYISAM;