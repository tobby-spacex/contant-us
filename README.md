# Contact Us Form

Docker based PHP project with contact us form.
Project repository:  `https://github.com/tobby-spacex/contant-us.git`

# Project Set Up - Docker

The project was built on docker. Since the structure has been divided into several parts, several servers are running. 
According you need to have Docker and docker-compose on your local machine.

#### Step 1

Install Docker and docker-compose

|                  | Version                   |  
| :--------------- | :------------------------ |  
| `Docker`         | `Docker version 20.10.21` |  
| :--------------- | :------------------------ |  
| `docker-compose` | `version 1.29.2`          | 


#### Step 2

Go to the `docker` directory in the project structure using terminal and run `docker-compose up`

    - This will download all docker container resources and Up all containers 
    - There ara four containers: `simtech-app`, `simtech-nginx`, `simtech-db`, `simtech-mailhog`
    - The app will be running on the port: `http://localhost:8000/`
    - MailHog: http://localhost:8025/

#### Step 3

Connect to Mysql database wich is running in docker container  (it's easier to configure in Mysql Workbench)

    - Hostname: 127.0.0.1
    - Port: 3307
    - Password: root

Create database Schema, use datadump to insert the table with sample data into your database.

Insert your database name in .env file (DB_DATABASE)

# Using the project

The project consists of three main pages, a landing page, a form submission page and a page with all the results. (also success page and 404 page)

In the project configured an email-testing tool MailHog. It gives possibility to test that outgoing emails from your app or website actually end up in the recipient’s mailbox. After each form submission you can open the the url http://localhost:8025/ and test your sended form data. 
Uploaded file you can see in the MIME section.