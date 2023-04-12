
## 3_level_referral
- Three level Referral system.

## Problem Statement
Create a login and the registration page. It's Referral and it's three level Referral system.

User and Wallet CRUD operation.

When User will add money in wallet than the Parent will get Commission based on below calulation.
- First level  = 10%,
- Second level = 5%,
- Third level  = 3%,

when User login show referral earning whith level wise.


## Project Requirement
- You can setup project on xampp or wampp software
- Laragon software is recommended.


## Project Setup
 - Clone the from this link ```https://github.com/Dinesh-Wasnik/3_level_referral```

 - Create database and set value in .env file.

 - ```DB_CONNECTION=mysql
		DB_HOST=127.0.0.1
		DB_PORT=3306
		DB_DATABASE=referral
		DB_USERNAME=root
		DB_PASSWORD=
	 ```
	set value like this.	

## Run Below commands

 - ```Composer install``` .
 
 - ```PHP artisan migrate ``` 

 - ```PHP artisan db:seed ``` 


# Note
- password for all user is 123456789.
