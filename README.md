# WHO Regional Menu of Essential Health Interventions

This Laravel application publishes and manages the WHO Regional Menu of Essential Health Interventions. It helps users browse evidence-based interventions and assemble shareable essential health packages for a chosen population and care context.

## Requirements

- PHP 8.4 with the ZIP, DOM, GD, Intl, and database extensions
- MySQL 5.7 or newer
- Composer 2
- Node.js 20.19 or newer and npm

## Installation

```bash
git clone <repository-url> ehi
cd ehi
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Create a MySQL database, then configure at least these values in `.env`:

```dotenv
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ehi
DB_USERNAME=root
DB_PASSWORD=
```

Build the database and seed it with the bundled domain data:

```bash
php artisan migrate --seed
```

## Running locally

Run the application and frontend asset compiler in separate terminals:

```bash
php artisan serve
```

```bash
npm run dev
```

Create optimized production assets with Vite:

```bash
npm run build
```

The public application is available at the configured `APP_URL`. The Filament administration panel is available at `/admin` and uses the application's normal user accounts.

## Features

- Browse interventions by age cohort, condition, level of care, public health function, and program area.
- Use overview pages for each intervention dimension.
- Search and combine multiple filters, including the confirmed-with-evidence status.
- Build custom Essential Packages from selected criteria.
- Export packages to Excel and PDF-based downloads.
- Share packages through stable UUID-based URLs.
- Manage users and all domain entities through Filament 5.
- Maintain English, French, and Portuguese content for translatable age cohort, condition, and program area fields.

## Domain model

The primary hierarchy is:

```text
Program Group → Program Area → Condition → Intervention
```

Each intervention also belongs to an Age Cohort, Level of Care, and Public Health Function.

## Administration

Sign in at `/admin` to manage:

- Age cohorts
- Conditions
- Interventions
- Levels of care
- Program areas and program groups
- Public health functions
- Users

## Updating seed data

Seeder data lives in `database/seeders/csv`. To capture the current domain tables from the configured database, run:

```bash
php artisan export:seeder-csvs
```

The export replaces all seven CSV files. Commit those files so new installations receive the updated dataset. To verify a clean installation, use a disposable database and run:

```bash
php artisan migrate:fresh --seed
```

`migrate:fresh` drops all database tables and must not be run against a database containing data you need to keep.

## Technology

- PHP 8.4
- Laravel 13
- Livewire 4
- Filament 5
- Vite 8
- MySQL

## License

This project is open-sourced under the MIT License.
