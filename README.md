**Database**
Import database.sql

**Actions for the API:**

Remove ingredients for pizza ID 8:

**PUT http://localhost/app_dev.php/pizzas/8**

[
   {
      "remove_ingredients": [2,3]
   }
]

Create new pizza with id's of the ingredients (cost is 50% on top of the ingredient price):

**POST http://localhost/app_dev.php/pizzas**

[
   {
      "name": "Vegetal",
      "ingredients": [
        3
      ]
   }
]



List all pizzas:

**GET http://localhost/app_dev.php/pizzas**

List pizza by id:

**GET http://localhost/app_dev.php/pizzas/1**
