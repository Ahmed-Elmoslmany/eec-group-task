<p align="center"><a href="https://www.eecegypt.com/en" target="_blank"><img src="https://eecegypt.com/assets/website_images/icon/logo-eec-1.png" width="400" ></a></p>

<h1 align="center">EEC Group Task</h1>

**Tools**: Laravel, Tailwind CSS

## Setup instructions

- First of all, make sure these tools are installed: `git`, `composer`, `node` and `php-82`.
- Clone this repo `git clone https://github.com/Ahmed-Elmoslmany/eec-group-task.git`.
- Copy the `.env.example` file and name it `.env`.
- Then run this `composer install && npm install && php artisan key:generate && php artisan migrate --seed`.
- Then run `php artisan serve` and `npm run dev` in two seperate terminals.
- Then open the browser and hit http://localhost:8000/ you will automatically get redirected to http://localhost:8000/products
- To show API routes run `php artisan route:list'
- Also you could try this CLI Command `php artisan products:search-cheapest <ProductId>` that takes product id and returns cheapest 5 pharmacies (id, name, price)
have this product in a JSON format (eg: `php artisan products:search-cheapest 22` ).
- By default the number of pharmacies is 5 but you could pass another parameter as pharmacies number then the command should be `php artisan products:search-cheapest <ProductId> <PharmaciesNumber>` (eg: `php artisan products:search-cheapest 22 10` ) return 10 cheapest pharmacies have this product.

