# FedUp
Eproject For Semester Two, a satirical website of FedEx courier service

# System Module

## Admin

1. Login
2. New courier
3. View all courier details
4. Send SMS – From to
5. Send delivery SMS
6. Update / delete courier
7. Create agent
8. Manage agent
9. Manage customer details
10. Status count
11. Download report for shipment

## Agent

1. Login
2. New courier
3. View all courier details
4. Send SMS From to
5. Send delivery SMS
6. Status of branch
7. Download report from branch

## User

1. Register
2. Login
3. Track consignment number
4. View status
5. Print status

# Module Description

###	Admin Login
Admin will have his/her own login details (username, password) to access the system
###	Create Bill – Admin , Agent
 Admin can create a Courier Bill after logging in. Bills contain the details of sender, receiver, courier type, delivery date and Courier Company.
###	Update bill – Admin , Agent
They can also update the Bill with the entries and if there is any modification. Agent can view the list of details of his location only.
###	Manage Customer details
Admin can manage all the Customer Details in a separate and secured Database
###	Reporting
Reports of all the Bill can be viewed by the admin of the system
###	Logout
At last they can logout if they have done with their actions on the database.
### Admin & Agent Dashboard
Status Counts
1. View total status count for shipment, in progress, delivered.
2. Admin will view all location status counts.
3. Agent can view only from or to location of his branch.
4. Add  Shipment
5. New Courier
6. Manage Shipment
7. Print Shipment
8. User can print tracking details
9.	Download Report (XLSX) Date Wise and City Wise
###	Admin Dashboard
1. Add Agent
2.	Can view only “from or to” location
3.	Create Agent city wise login
4.	Manage Customer
5.	Search
6. User Login
7.	Track Shipment
8. User can search using consignment tracking details
9. Shipment status
10.	Print
11. User can print tracking details

# Documentation

1. Certificate of Completion.
2. Table of Contents.
3. Problem Definition.
4. Customer Requirement Specification.
5. Project Plan.
6. E-R Diagrams.
7. Algorithms.
8. GUI Standards Document.
9. Interface Design Document.
10. Task Sheet.
11. Project Review and Monitoring Report.
12. Unit Testing Check List.
13. Final Check List.

## Certificate of Completion

This is to certify that Syed Muhammad Hassam Uddin, Osama Alam, Fariyal Yusuf and Muhammad Rehan have successfully completed the Courier Management System Development Project on May 31st 2024

We recognize the dedication, hard work, and commitment demonstrated in developing a comprehensive web application for courier management, which has significantly enhanced operational efficiency and customer satisfaction.

Presented by

Batch FN 319
Aptech Tariq Road


## Table of Contents

## Problem Statement

The current courier management system of the organization is handled manually, which poses several challenges in terms of efficiency, accuracy, and customer satisfaction. Manual handling of records leads to errors, delays, and difficulty in tracking and updating the status of consignments. This negatively impacts the organization's ability to provide timely and accurate information to its customers regarding their packages.

## Customer Requirement Specification

1. Login Page
2. Register Page
3. Front pages Of website for advertisment and visitors
4. Admin panel
5. Agent panel
6. Customer panel
7. Add Packages
8. Manage Packages

## Project Plan

### Project Overview
Project Name: Courier Management System Development
Project Manager: Syed Muhammad Hassam Uddin
Start Date: May 7th 2024
End Date: May 31st 2024
Project Sponsor: Aptech Tariq Road

#### Objective
Develop a web application to automate and streamline the courier management process, enhancing operational efficiency and customer satisfaction.

### Project Scope

#### Inclusions:

Development of a web-based application.
Features for customer information management.
Package tracking and status updates.
Real-time tracking capabilities for customers.
Automated status updates by admin.

#### Exclusions:

Mobile application development.
Hardware procurement or setup.
Maintenance and support beyond the initial launch phase.

### Project Timeline

#### Week 1 Initiation (1 weeks)

Project Kickoff Meeting
Requirement Gathering and Analysis
Project Charter Development
Phase 2: Planning (3 weeks)

#### Week 2 Planning & Design (1 weeks)


Detailed Project Plan
Resource Allocation
System Design Document
Database Design
User Interface Design

#### Week 3 Development, Testing and Deployment (1 weeks)

Backend Development
Frontend Development
Integration of Modules
Unit Testing
Final Deployment
Post-Deployment Updates


## E-R Diagrams

## Final Check List

1. Login
2. Register
3. View all packages
4. Create new accounts
5. Front Website
6. Backend Panel
7. Logout feature


# Database queries

## Creation of Database

1. CREATE DATABASE fedupdb;

## Creation of tables

2. CREATE TABLE admins(
	  id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(225),
    last_name VARCHAR(225),
  	email VARCHAR(225),
    phone_number VARCHAR(225),
    password VARCHAR(225)
);
CREATE TABLE agents(
	  id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(225),
    last_name VARCHAR(225),
  	email VARCHAR(225),
    phone_number VARCHAR(225),
    password VARCHAR(225)
);
CREATE TABLE customers(
	  id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(225),
    last_name VARCHAR(225),
  	email VARCHAR(225),
    phone_number VARCHAR(50),
    password VARCHAR(100)
);
CREATE table contactus(
	message_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(225),
    email VARCHAR(225),
    subject VARCHAR(65535),
    message VARCHAR(65535)
);
CREATE TABLE locations (
    location_name VARCHAR(225)
);
CREATE TABLE packages(
	  package_id INT PRIMARY KEY AUTO_INCREMENT,
    from_address VARCHAR(225),
    to_address VARCHAR(225),
  	delivery_type VARCHAR(225),
    special_instructions VARCHAR(225),
    package_weight_in_KG INT (9),
    distance_to_travel_in_KM INT (9),
    status varchar(225),
    price int (9),
    cost int (9),
    assigned_agent INT (9),
    by_customer INT (9),
	FOREIGN KEY (assigned_agent) REFERENCES agents(id),
	FOREIGN KEY (by_customer) REFERENCES customers(id)
);


## Creation of table Entries

3. INSERT INTO packages VALUES (NULL, 'Karachi', 'Lahore', 'standard', 'Hi there', 3, 300, 'Karachi', 2550, 1275, 1, 1), (NULL, 'Multan', 'Karachi', 'express', 'Nothing', 5, 225, 'Multan', 2388, 348, 1, 1),
(NULL, 'Karachi', 'Lahore', 'standard', 'Hi there', 3, 300, 'Karachi', 2550, 1275, 1, 1);

INSERT INTO admins VALUES (NULL, "admin", "admin", "admin@admin.com", "123456789","admin"), (NULL, "Syed Muhammad", "Hassam Uddin", "hassam@gmail.com", "123456789","hassam"), (NULL, "Fariyal", "Something", "fariyal@gmail.com", "123456789","fariyal"),
(NULL, "Usama", "Alam", "Usama@gmail.com", "123456789","Usama");

INSERT INTO agents VALUES (NULL, "agent", "agent", "agent@agent.com", "123456789","agent"), (NULL, "Hammad", "Tariq", "hammad@gmail.com", "123456789","hammad"), (NULL, "Noor", "Something", "noor@gmail.com", "123456789","noor");

INSERT INTO customers VALUES (NULL, "customer", "customer", "customer@customer.com", "123456789","customer"), (NULL, "Rehan", "Something", "rehan@gmail.com", "123456789","rehan"), (NULL, "Aman", "Ullah", "aman@gmail.com", "123456789","aman");

INSERT INTO locations VALUES ('Gwadar'), ('Karachi'), ('Hyderabad'), ('Sukkur'), ('Multan'), ('Lahore'), ('Faisalabad'), ('Rawalpindi'), ('Islamabad'), ('Kashmir');

