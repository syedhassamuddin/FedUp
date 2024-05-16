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

•	Login
•	New courier
•	View all courier details
•	Send SMS From to
•	Send delivery SMS
•	Status of branch
•	Download report from branch

## User

•	Register
•	Login
•	Track consignment number
•	View status
•	Print status

# Module Description

•	Admin Login
o	Admin will have his/her own login details (username, password) to access the system
•	Create Bill – Admin , Agent
o	Admin can create a Courier Bill after logging in. Bills contain the details of sender, receiver, courier type, delivery date and Courier Company.
•	Update bill– Admin , Agent
o	They can also update the Bill with the entries and if there is any modification. Agent can view the list of details of his location only.
•	Manage Customer details
o	Admin can manage all the Customer Details in a separate and secured Database
•	Reporting
o	Reports of all the Bill can be viewed by the admin of the system
•	Logout
o	At last they can logout if they have done with their actions on the database.
•	Admin & Agent Dashboard
o	Status Counts
	View total status count for shipment, in progress, delivered.
	Admin will view all location status counts.
	Agent can view only from or to location of his branch.
o	Add  Shipment
	New Courier
o	Manage Shipment
o	Print Shipment
	User can print tracking details
o	Download Report (XLSX)
	Date Wise
	City Wise
•	Admin Dashboard
o	Add Agent
	Can view only “from or to” location
o	Create Agent city wise login
o	Manage Customer
	Search
•	User Login
o	Track Shipment
	User can search using consignment tracking details
o	Shipment status
o	Print
User can print tracking details



# Database queries

1. CREATE DATABASE fedupdb;
2. CREATE TABLE packages(
	  package_id INT PRIMARY KEY AUTO_INCREMENT,
    from_address VARCHAR(225),
    to_address VARCHAR(225),
  	delivery_type VARCHAR(225),
    special_instructions VARCHAR(225)
);
3. CREATE TABLE admins(
	  admin_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(225),
    last_name VARCHAR(225),
  	email VARCHAR(225),
    phone VARCHAR(50),
    password VARCHAR(100),
);
4. CREATE TABLE agents(
	  agent_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(225),
    last_name VARCHAR(225),
  	email VARCHAR(225),
    phone VARCHAR(50),
    password VARCHAR(100),
);
<<<<<<< HEAD
6.  
=======
5. CREATE TABLE customers(
	  customer_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(225),
    last_name VARCHAR(225),
  	email VARCHAR(225),
    phone_number VARCHAR(50),
    password VARCHAR(100),
);
6. INSERT INTO admins VALUES (NULL, "admin", "admin", "admin@admin.com", "123456789","admin");
INSERT INTO agents VALUES (NULL, "agent", "agent", "agent@agent.com", "123456789","agent");
INSERT INTO customers VALUES (NULL, "customer", "customer", "customer@customer.com", "123456789","customer");
>>>>>>> f9bb860b45b4c27c15696ab0f357181b0fa6ac77
