**Actions for the API:**

Remove ingredients:

**PUT http://localhost/app_dev.php/pizzas/8**

[
   {
      "remove_ingredients": [2,3]
   }
]

Create new pizza with id's of the ingredients:

**POST http://localhost/app_dev.php/pizzas**

[
   {
      "name": "Vegetal",
      "cost": 40,
      "ingredients": [
        3
      ]
   }
]

List all pizzas:

**GET http://localhost/app_dev.php/pizzas**

List pizza by id:

**GET http://localhost/app_dev.php/pizzas/1**
