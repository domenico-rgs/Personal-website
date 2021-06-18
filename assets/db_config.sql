CREATE SCHEMA website;
USE website;

DROP TABLE IF EXISTS projects;
DROP TABLE IF EXISTS messages;

CREATE table projects
(title CHAR(25) PRIMARY KEY,
descript VARCHAR(500),
lang CHAR(50),
link VARCHAR(100));

CREATE table messages
(personName CHAR(25),
surname CHAR(25),
email CHAR(50),
message VARCHAR(500));

insert into projects values("Sunday Project","Identify a model for the time series value of Sunday as a function of day of year and time of day","MATLAB","https://github.com/domenico-rgs/ProgettoSunday");
insert into projects values("FStats","Bash/Shell script to draw histograms of the size and last modification date of files in a directory","Shell","https://github.com/domenico-rgs/FStats");
insert into projects values("G20 Project","Web application for booking tickets in a multiplex cinema","Java, HTML, CSS, JS","https://github.com/domenico-rgs/Progetto-G20");
insert into projects values("EFSA Project","It is requested to propose an appropriate statistical model and to analyse the data of an EFSA case study about an hypothetical toxicological in-vivo experiment","MATLAB","https://github.com/domenico-rgs/EFSA-Project");
insert into projects values("Puzzle Week","Solve the anagrams!","Java","https://github.com/domenico-rgs/SettimanaEnigmistica");

