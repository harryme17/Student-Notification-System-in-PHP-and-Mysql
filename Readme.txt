Student Notification System

Project Overview
The Student Notification System is a web application developed to facilitate communication between staff members and students. It allows staff to send notifications and attendance updates directly to students. This project was created during my diploma studies.

Technologies Used
- Backend: PHP
- Database: MySQL
- Local Server: XAMPP
- Frontend: Bootstrap for a minimalistic and responsive UI design

How to Use the Project
1. Download the Project Files:
   - Download the project files from the provided link or repository.

2. Setup the Local Server:
   - Install and configure XAMPP on your local machine.

3. Create the Database:
   - Open phpMyAdmin through XAMPP.
   - Create a new database named `login`.
   - Import the provided SQL queries to set up the required tables and initial data.

4. Run the Application:
   - Place the project files in the `htdocs` directory of your XAMPP installation.
   - Start the Apache and MySQL services from the XAMPP control panel.
   - Open your browser and navigate to `http://localhost/{your_project_directory}` to access the application.

Features
- Staff members can log in to the system and send notifications to students.
- Attendance records can be managed and updated by staff.
- Students can log in to view their notifications and attendance status.

Future Enhancements
- Adding user authentication and role-based access control.
- Enhancing the UI with more interactive elements.
- Integrating with an SMS/email API for external notifications.

DB Name: `login`


CREATE TABLE `aadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) 


CREATE TABLE `notification` (
  `id` int(2) NOT NULL,
  `total` int(2) NOT NULL DEFAULT 30,
  `uerName` varchar(256) NOT NULL,
  `month` varchar(10) NOT NULL,
  `present` int(2) NOT NULL,
  `absent` int(2) NOT NULL,
  `notification` varchar(256) NOT NULL
) 

CREATE TABLE `notification_s` (
  `id` int(11) NOT NULL,
  `student` varchar(256) NOT NULL,
  `notification` varchar(255) NOT NULL
)

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
)

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
)
