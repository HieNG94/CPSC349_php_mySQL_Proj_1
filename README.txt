Author: Hien Nguyen 
CWID: 889341772.
GitHub:https://github.com/HieNG94/CPSC349_Project_1.git
----------------------------------------------------------------------
DESCRIPTION:
This a website for a pet care center.
The package contains:
-README text file.
-Project review paper
-Project folder
-A text file for database in case of the sql dump is having error.
----------------------------------------------------------------------
REQUIREMENT: 
MySQL workbench, XAMPP, Google Chrome (using other browser may cause the website do not work properly)
----------------------------------------------------------------------
INSTRUCTION:
Step 1: Download and install XAMPP and MySQL workbench.
Step 2: Open XAMPP, start Apache and MySQL ser.
Step 3: Click on Explorer. It then prompt to new window.
Step 4: Choose htdocs folder
Step 5: Copy the project folder to htdocs file.
Step 6: Open workbench and make new MySQL connection
Step 7: Import the database from database folder in the project package. If you can import from the sql dump, 
copy the code from database.txt to the MySQL workbench.
Step 8: Run the database from MySQL workbench by selecting all the code and click the thunder icon.
Step 9: Open Chrome, and enter the this link: http://localhost/CPSC349_Project_1/scripts/homepage/index.php
----------------------------------------------------------------------
TESTING:
Some data already added to the database.
An staff account is added for testing.
-Username: Staff1
-Password: Staff1
Some information about pet and appointment are added for the first customer.
Create the first customer account to access these information.
----------------------------------------------------------------------
COMMENT:
The project just provide some basic functions for create and manage information of a pet care center.
The add appointment as staff may not work properly, because I wanted to add it at the last hours, I did not have time to debug it.
The project do not follow any framework like MVC framework, so it is a bit messy.