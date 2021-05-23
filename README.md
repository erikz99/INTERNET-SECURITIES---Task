# Project info
The project is a PHP implementation of shopping cart. It includes Web Service that communicates with mysql database and web based application that talks with the service implementing adding, removing and listing products. 

## Project structure
### Web Service
API accepts two mandatory query parameters - entity and action. 
#### - entity - Here you can provide the entity you want to manipulate. Current available entities - product.
#### - action - Here you can provide the action you want to perform to the entity. Current available actions are add, delete and get-all.
### Web Application
You have one main screen where you can add, delete and view all products.

## How to run locally
1. Run xampp or other Apache and MySql server. 
2. Execute the ```sql/shop.sql``` in the MySql database.
3. Change http://localhost/Task/ in ```app/config/config.ini``` to the url where application is deployed. 
4. Change database configuration in ```api/config/config.ini``` to the configuration of MySql server.
5. Open the App url in browser. 
 