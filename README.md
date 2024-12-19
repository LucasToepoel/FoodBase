
This is a work-in-progress web app:

- Uses Laravel
- Uses Composer
- Uses PHP
- Uses NPM
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
    npm run build
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
##progression (not the prettiest but this shows how i am going along)
Progress 00:
![Screenshot 2024-09-11 120326](https://github.com/user-attachments/assets/3fe5173a-9d60-4043-87b3-a1d18cfc0d8d)
![Screenshot 2024-09-11 120311](https://github.com/user-attachments/assets/5d35268e-5f04-4355-a4dd-bbc050f5acff)
Progress 01:

![Screenshot 2024-10-09 122656](https://github.com/user-attachments/assets/ebc16604-0552-4536-a16b-fe78b4d9d660)
![Screenshot 2024-10-09 122511](https://github.com/user-attachments/assets/db1d48e7-77dd-4947-a5d7-430f878e7472)
![Screenshot 2024-10-09 122552](https://github.com/user-attachments/assets/9a37e12e-8945-49d4-9042-81af78776105)
![Screenshot 2024-10-09 122612](https://github.com/user-attachments/assets/57f1d7ad-9338-4e92-8696-be7e431cfffd)

Progress 02:

![Screenshot 2024-12-19 135418](https://github.com/user-attachments/assets/75c4383b-7716-4aed-92b7-ed70c45fa9d0)
![Screenshot 2024-12-19 135215](https://github.com/user-attachments/assets/199618c4-80bc-4891-b68b-7b6bba3ac232)
![Screenshot 2024-12-19 135158](https://github.com/user-attachments/assets/71b3bedc-de89-4870-ac81-5ad5359f4358)
![Screenshot 2024-12-19 135457](https://github.com/user-attachments/assets/0176b09b-71be-476a-aa9b-e0548cb087c4)

