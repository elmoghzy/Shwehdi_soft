# Architecture Blueprint

## 1) Frontend Routes (Customer Facing)

- `/` : Home page (hero, top bundles, why us, category stats)
- `/software-solutions` : Software solutions page
- `/hardware` : Hardware catalog page
- `/hardware/{product:slug}` : Single product details page
- `/bundles` : Bundles and offers page
- `/contact` (GET) : Lead capture form
- `/contact` (POST) : Save lead into CRM table (`leads`)

## 2) Core Database Schema

- `categories`
  - `id`, `name`, `slug`, `image`, timestamps
- `products`
  - `id`, `category_id`, `name`, `slug`, `brand`, `description`, `specs` (JSON), `price`, `is_in_stock`, `main_image`, timestamps
- `bundles`
  - `id`, `name`, `slug`, `description`, `price`, `image`, timestamps
- `bundle_product`
  - `bundle_id`, `product_id`, `quantity`
- `leads`
  - `id`, `client_name`, `phone`, `interested_in`, `status`, `notes`, timestamps
- `settings`
  - `id`, `key`, `value`, timestamps

## 3) Eloquent Relationships

- Category `hasMany` Product
- Product `belongsTo` Category
- Product `belongsToMany` Bundle (`withPivot('quantity')`)
- Bundle `belongsToMany` Product (`withPivot('quantity')`)

## 4) Admin Panel (Filament v5)

Panel path: `/admin`

Resources:
- Categories
- Products
- Bundles
  - Includes relation manager to attach products and manage `quantity`
- Leads (CRM)
- Settings (key/value)

## 5) Seeded Startup Data

- Default admin user:
  - Email: `admin@example.com`
  - Password: `password`
- Sample categories, products, bundles, and settings are seeded.

## 6) Lead Flow

- Customer submits form on `/contact`
- Data is validated via `StoreLeadRequest`
- New record is created in `leads` with default status `new`
- Sales team manages status updates from Filament (Leads resource)
