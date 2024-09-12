
this is a work-in progress webapp
- uses laravel
- uses composer
- uses php
- currently only works with windows, due to using Zbar.exe in the commandline to process the image.
it currently lets you upload images of EAN13 barcodes, and add food product nutrients into a database
- one of the packages needs the GD extention enabled in your php.ini file (uncomment it in the file)

you can run this project yourself by cloning the project, currently the ENV variables are standard. (so no tweaking needed)

- after cloning:
-copy .env.example and rename it to .env
- use commands:
```
composer install
php artisan key:generate
npm install
php artisan migrate
php artisan db:seed (optional)
npm run dev
php artisan serve
```

urls when using php artisan serve:
- http://127.0.0.1:8000/ (laravel welcomepage)
- http://127.0.0.1:8000/FoodBase/ (my application)
- http://127.0.0.1:8000/FoodBase/create

plans are to implement:
- UserInterface
- MealPlan scheduling/Mealprep
- Dashboard with Health Information
- Being Able to compose meals with products in the DB
![Screenshot 2024-09-11 120326](https://github.com/user-attachments/assets/3fe5173a-9d60-4043-87b3-a1d18cfc0d8d)
![Screenshot 2024-09-11 120311](https://github.com/user-attachments/assets/5d35268e-5f04-4355-a4dd-bbc050f5acff)
