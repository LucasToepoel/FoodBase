
this is a work-in progress webapp
- uses laravel
- uses composer
- currently only works with windows, due to using Zbar.exe in the commandline to process the image.
it currently lets you upload images of EAN13 barcodes, and add food product nutrients into a database

you can run this project yourself by cloning the project, currently the ENV variables are standard. (so no tweaking needed)

after cloning do not forget to run composer install, and create an .env file from the .env.example file
also run the migrations (php artisan migrate)

urls when using php artisan serve:
- http://127.0.0.1:8000/ (laravel welcomepage)
- http://127.0.0.1:8000/FoodBase/ (my application
- http://127.0.0.1:8000/FoodBase/create

plans are to implement:
- UserInterface
- MealPlan scheduling/Mealprep
- Dashboard with Health Information
- Being Able to compose meals with products in the DB
