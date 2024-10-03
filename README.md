
This is a work-in-progress web app:

- Uses Laravel
- Uses Composer
- Uses PHP
- Currently only works with Windows, due to using Zbar.exe in the command line to process the image.

It currently lets you upload images of EAN13 barcodes and add food product nutrients into a database.

One of the packages needs the GD extension enabled in your `php.ini` file (uncomment it in the file).

You can run this project yourself by cloning the project.

### After cloning:

1. Copy `.env.example` and rename it to `.env`.
2. Use the following commands:
    ```sh
    composer install
    php artisan key:generate
    npm install
    php artisan migrate
    php artisan db:seed (optional)
    npm run dev
    php artisan serve
    ```

### URLs when using `php artisan serve`:

- [http://127.0.0.1:8000/Product](http://127.0.0.1:8000/Product)
- [http://127.0.0.1:8000/Product/create](http://127.0.0.1:8000/Product/create)
- [http://127.0.0.1:8000/Product/?id](http://127.0.0.1:8000/Product/?id)

### Plans are to implement:

- User Interface
- Meal Plan scheduling/Meal prep
- Dashboard with Health Information
- Being able to compose meals with products in the DB

![Screenshot 2024-09-11 120326](https://github.com/user-attachments/assets/3fe5173a-9d60-4043-87b3-a1d18cfc0d8d)
![Screenshot 2024-09-11 120311](https://github.com/user-attachments/assets/5d35268e-5f04-4355-a4dd-bbc050f5acff)
