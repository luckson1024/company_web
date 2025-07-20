# Copilot Instructions for company_web

## Big Picture Architecture
- **Monolithic Modular Laravel**: The project uses a modular structure under `app/Modules/`, with each business domain (e.g., User, Service, Product) isolated into its own folder containing Controllers, Models, Policies, Requests, Factories, Tests, Views, and documentation. This enables scalable development and clear separation of concerns.
- **Admin Panel & Public Site**: There is a clear split between admin functionality (user management, analytics, CRUD for modules) and public-facing content (services, products, blog, careers, etc.), with Blade views for both.
- **Security & Permissions**: Uses Spatie Laravel Permission for RBAC. Seeders set up roles and a Super Admin. Security layer (middleware, audit logging, granular permissions) is planned and partially scaffolded.

## Developer Workflows
- **Build & Serve**: Use `php artisan serve` to run the development server. Vite is used for frontend assets (`npm run dev`).
- **Testing**: Run tests with `phpunit` or `vendor/bin/phpunit`. Feature and unit tests are organized under `tests/Feature` and `tests/Unit`.
- **Database**: SQLite is used for local development. Migrations are in `database/migrations/`. Seeders for roles and users are in `database/seeders/`.
- **Authentication**: Laravel UI Bootstrap Auth is installed (`php artisan ui bootstrap --auth`).

## Project-Specific Conventions
- **Module Structure**: Every module follows the structure:
  ```
  app/Modules/ModuleName/
  ├── Controllers/
  ├── Models/
  ├── Policies/
  ├── Requests/
  ├── Factories/
  ├── Tests/
  ├── Views/
  ├── routes.php
  └── README.md
  ```
- **Health Check First**: For any new module, add a health check route and controller method before implementing business logic. Example:
  ```php
  // Controller
  public function healthCheck() {
    return response()->json(['status' => 'success', 'message' => 'Module is running']);
  }
  // Route
  Route::get('/module/health', [ModuleController::class, 'healthCheck']);
  ```
- **Documentation**: All modules and features must be documented in their respective README.md and in `docs/DEVELOPER_DOCS.md` and `docs/USER_GUIDE.md`.
- **Task Tracking**: All development tasks are tracked in `TODO.md` and must be updated after every change.

## Integration Points & Dependencies
- **Spatie Laravel Permission**: For roles and permissions.
- **Vite**: For asset bundling and hot reload.
- **Bootstrap 5**: For UI components.
- **Mail & Queue**: Newsletter and contact forms use Laravel's mail and queue systems.

## Examples & References
- See `app/Modules/Service/README.md` for a module documentation template.
- See `docs/instructions.md` for coding standards and AI agent workflow.
- See `TODO.md` for current and planned tasks.

## Patterns to Follow
- Always use the modular structure for new features.
- Update documentation and TODO.md with every change.
- Use health check endpoints for new modules before building features.
- Prefer TDD: add tests in `app/Modules/ModuleName/Tests/` and `tests/Feature/`.

---

: The Design Vision
Our design direction is "Corporate Clarity with a Human Touch." It's a style that feels professional, trustworthy, and technologically advanced, yet remains intuitive, warm, and easy to navigate.
Overall Mood & Aesthetic:
Clean, bright, and uncluttered. The design breathes with generous whitespace, creating a sense of calm and focus. It is minimalist without being cold, and professional without being boring. The UI should feel like a premium, well-crafted tool that is a pleasure to use.
Core Design Principles:
Typography: A modern, geometric sans-serif font for headings (like Inter, Manrope, or Sora) to convey clarity and confidence. A highly legible, friendly sans-serif for body text (like Inter or Figtree) ensures effortless reading.
Color Palette:
Primary: A deep, sophisticated Navy Blue (#0A192F) or Charcoal Gray (#2D3748) for primary text and dark elements.
Background: A clean, soft Off-White (#F8F9FA) or a very light gray. No pure white to reduce eye strain.
Accent/CTA: A vibrant but professional Teal Green (#2DD4BF) or a confident Electric Blue (#3B82F6) for all primary buttons, links, and calls-to-action. This color will guide the user's eye to important actions.
Secondary/Subtle: A light gray (#E2E8F0) for borders, card backgrounds, and dividers.
Layout & Spacing: A strict 12-column grid provides structure, but we will use asymmetrical layouts for key sections to create visual interest and dynamism. Spacing is generous and consistent, following a 4px or 8px grid system.
Imagery & Iconography:
Images: High-quality, bright photos of diverse people collaborating in modern, clean office spaces. Abstract, soft-focus gradients will be used as background elements to add depth and a touch of tech-forward elegance.
Icons: Feather-light, consistent line icons. They should be simple, recognizable, and never filled.
Interactivity & Feel:
Microinteractions: Subtle is key. Buttons have a gentle "lift" (soft shadow grows) and color fade on hover. Input fields highlight with a thin, colored border when active. Page transitions are smooth and fast fades.
Cards & Containers: Cards will have slightly rounded corners (e.g., 8-12px radius) and a very subtle, soft drop shadow to make them gently float off the background.

**If any section is unclear or missing, please request clarification or examples from the user.**
