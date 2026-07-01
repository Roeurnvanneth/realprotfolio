# របៀបដំឡើង Portfolio Code ទាំងស្រុង (ជំហានៗ)

## ជំហានទី ១ — Copy files ទៅដាក់ក្នុង project `C:\portfolio`

Copy folder និងឯកសារខាងក្រោម ដាក់ត្រួត (overwrite) ទៅលើ folder ដែលមានឈ្មោះដូចគ្នានៅក្នុង `C:\portfolio` របស់អ្នក:

| ពីក្នុង zip នេះ | ដាក់ទៅ |
|---|---|
| `app/Models/*.php` | `C:\portfolio\app\Models\` |
| `app/Http/Controllers/SiteController.php` | `C:\portfolio\app\Http\Controllers\` |
| `app/Http/Controllers/Admin/*.php` | `C:\portfolio\app\Http\Controllers\Admin\` (folder ថ្មី ត្រូវបង្កើត) |
| `database/migrations/*.php` | `C:\portfolio\database\migrations\` (ត្រួត/overwrite ឯកសារដែលមានឈ្មោះដូចគ្នា) |
| `database/seeders/*.php` | `C:\portfolio\database\seeders\` |
| `resources/views/layouts/app.blade.php` | `C:\portfolio\resources\views\layouts\` (ត្រួត file ចាស់) |
| `resources/views/layouts/admin.blade.php` | `C:\portfolio\resources\views\layouts\` (ថ្មី) |
| `resources/views/partial/navbar.blade.php` | `C:\portfolio\resources\views\partial\` |
| `resources/views/partial/footer.blade.php` | `C:\portfolio\resources\views\partial\` |
| `resources/views/home.blade.php` | `C:\portfolio\resources\views\` (ត្រួត file ចាស់) |
| `resources/views/admin/` (ទាំង folder) | `C:\portfolio\resources\views\admin\` (folder ថ្មី) |
| `routes/web.php` | `C:\portfolio\routes\` (ត្រួត file ចាស់) |
| `public/css/site.css` | `C:\portfolio\public\css\` (folder ថ្មី) |
| `public/css/admin.css` | `C:\portfolio\public\css\` |

📌 Tip: អ្នកអាច copy ទាំង folder `app`, `database`, `resources`, `routes`, `public` ពី zip នេះ ហើយ paste ត្រួតលើ folder ដូចគ្នានៅ `C:\portfolio` បាន — Windows នឹងសួរថា "Replace files?" សូមជ្រើស **Replace / Yes to all**។ វានឹងមិនលុបឯកសារផ្សេងទៀតរបស់អ្នកទេ គ្រាន់តែបន្ថែម/ត្រួតលើឯកសារដែលដូចគ្នាប៉ុណ្ណោះ។

## ជំហានទី ២ — បើក Terminal នៅ `C:\portfolio` ហើយរត់ពាក្យបញ្ជាខាងក្រោម

```bash
php artisan migrate:fresh --seed
```

⚠️ ពាក្យបញ្ជានេះនឹង **លុប tables ចាស់ទាំងអស់ ហើយបង្កើតថ្មីឡើងវិញ** តាម schema ថ្មីដែលត្រូវនឹង Model/Controller ដែលខ្ញុំបានសរសេរ បន្ទាប់មកវានឹងបញ្ចូលទិន្នន័យសាកល្បង (sample data) ឲ្យដោយស្វ័យប្រវត្តិ។

បន្ទាប់មក រត់ពាក្យបញ្ជានេះដើម្បីឲ្យរូបភាព/ឯកសារ upload អាចបង្ហាញបាន:

```bash
php artisan storage:link
```

ហើយសម្អាត cache ម្តងទៀតឲ្យប្រាកដ:

```bash
php artisan config:clear
php artisan view:clear
```

## ជំហានទី ៣ — បើក server

```bash
php artisan serve
```

វានឹងបង្ហាញអាស័យដ្ឋានដូចជា `http://127.0.0.1:8000`

⚠️ **សំខាន់**៖ សូមបើក browser ទៅកាន់ `http://127.0.0.1:8000` (អាស័យដ្ឋានពី `php artisan serve`) មិនមែនទៅកាន់ `http://localhost:5173` ឬ Vite dev server ទេ — នោះហើយជាមូលហេតុដែលអ្នកឃើញ "Vite + Laravel" page ដែលឃើញពីមុន។ បើអ្នកមិនបាន run `npm run dev` ទេ Vite page នឹងមិនលេចទេ។ Project នេះប្រើ CSS ធម្មតា (មិនចាំបាច់ Vite) ដូច្នេះមិនបាច់ run `npm run dev` ក៏ដំណើរការបានដែរ។

## ជំហានទី ៤ — មើល Frontend (Portfolio site)

ទៅកាន់: `http://127.0.0.1:8000/`

អ្នកនឹងឃើញ Hero, About, Skills, Experience, Education, Services, Projects, Testimonials, Contact, Footer ដែលទាញទិន្នន័យពី database មកបង្ហាញដោយស្វ័យប្រវត្តិ។

## ជំហានទី ៥ — Login ចូល Admin Panel

ទៅកាន់: `http://127.0.0.1:8000/admin/login`

```
Email:    admin@portfolio.test
Password: password123
```

⚠️ សូមប្តូរ password នេះវិញនៅពេលក្រោយ ដើម្បីសុវត្ថិភាព (តាមរយៈ `php artisan tinker` ហើយ update user, ឬសរសេរទំព័រ change-password ផ្ទាល់ខ្លួន)។

នៅក្នុង Admin Panel អ្នកអាច៖
- កែប្រែ **About** (ឈ្មោះ, bio, រូបថត, CV, social links)
- គ្រប់គ្រង **Skills**, **Experience**, **Education**, **Services**, **Categories**, **Projects**, **Testimonials**
- មើល **Contact Messages** ដែលអ្នកមើល site ផ្ញើមកតាម Contact Form
- កែប្រែ **Settings** (ឈ្មោះ site, tagline, footer, email)

រាល់ការកែប្រែ នឹងបង្ហាញនៅលើ frontend home page ភ្លាមៗ។

## បើមានបញ្ហា

- **Login មិនចូលបាន** → ប្រាកដថា `php artisan migrate:fresh --seed` បានដំណើរការដោយជោគជ័យ (admin user ត្រូវបានបង្កើតតាម AdminUserSeeder)
- **រូបភាពមិនបង្ហាញ** → ប្រាកដថាបាន run `php artisan storage:link`
- **CSS មិនបង្ហាញ (page ធម្មតា គ្មាន style)** → ពិនិត្យថា folder `public/css/site.css` និង `public/css/admin.css` មាននៅត្រឹមត្រូវ
- **404 ឬ error ផ្សេងៗ** → run `php artisan route:list` ដើម្បីពិនិត្យ route ទាំងអស់ត្រូវបានចុះឈ្មោះត្រឹមត្រូវ
