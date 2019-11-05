CREATE TABLE user (
user_id INT(11) NOT NULL AUTO_INCREMENT,
email VARCHAR(256) NOT NULL UNIQUE,
password VARCHAR(64) NOT NULL,
name VARCHAR(256) NOT NULL,
PRIMARY KEY (user_id)
);

CREATE TABLE scripts (
script_id INT(64) PRIMARY KEY,
user_id INT(64) NOT NULL,
fullscript_filename VARCHAR(256) NOT NULL,
condscript_filename VARCHAR(256) NOT NULL
script_timestamp DATETIME() NOT NULL, /* default fsp value is 0 digits (max is microseconds, 6 digits) */
);

CREATE TABLE rosters (
roster_id INT(64) PRIMARY KEY,
user_id INT(64) NOT NULL,
roster_filename VARCHAR(256) NOT NULL, /* contains raw data for one roster */
roster_timestamp DATETIME() NOT NULL,
);

CREATE TABLE seating_charts (
seating_chart_filename VARCHAR(256) PRIMARY KEY,
roster_id INT(64) NOT NULL,
seating_chart_timestamp DATETIME() NOT NULL,
);