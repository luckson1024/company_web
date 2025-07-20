# To-Do List

### Phase 1: Foundation & Security Core
- [x] Initialize Modular Project Structure & Documentation
- [x] Set up basic Laravel project (`composer create-project`)
- [x] Configure `.env` for database connection
- [x] Implement Admin Module Health Check
- [x] Install Laravel's authentication scaffolding (`php artisan ui bootstrap --auth`)
- [x] Install and configure Spatie Laravel Permission package
- [x] Create seeders for Roles and a Super Admin User
- [x] Create Admin Panel main layout (shell)
- [x] Finalize and pass login redirect test (Codespaces domain)
- [x] Implement User Management (Admin CRUD for Users, Modular)
- [x] Add analytics to admin dashboard (user count, role breakdown, recent logins)
- [x] Define and document system folder structure for all modules (see below)
- [x] Add standard files to each module: Controller, Model, Migration, Policy, Request, Factory, Test, Views, Routes, Docs
- [ ] Plan and document security layer for future implementation (see Security Layer section)

### Phase 2: Modular Business & UI Development
- [ ] Build `Service` module (Model, Migration, Controller, Admin CRUD, Modular)
- [ ] Build Service module frontend (Blade views: index, create, edit, show; UI matches design vision)
- [ ] Build `Product` module (Model, Migration, Controller, Admin CRUD, Modular)
- [ ] Build Product module frontend (Blade views: index, create, edit, show; UI matches design vision)
- [ ] Build `Portfolio` module (Model, Migration, Controller, Admin CRUD, Modular)
- [ ] Build Portfolio module frontend (Blade views: index, create, edit, show; UI matches design vision)

### Phase 3: Content Marketing & Growth Modules
- [ ] Build `Blog` module (Model, Migration, Controller, Admin CRUD, Modular)
- [ ] Build Blog module frontend (Blade views: index, create, edit, show; UI matches design vision)
- [ ] Build `Career` module (Model, Migration, Controller, Admin CRUD, Modular)
- [ ] Build Career module frontend (Blade views: index, create, edit, show; UI matches design vision)

### Phase 4: Frontend UI & Dynamic Content
- [ ] Create public site layout (Header, Footer, Nav) using Bootstrap 5 and design vision
- [ ] Create public Blade views for Services, Products, Portfolio, Blog, Careers (UI matches design vision)
- [ ] Build `Content` module for dynamic homepage sections (Modular)
- [ ] Implement Blade components for display templates (grid, slider, etc.)
- [ ] Build 'About Us' page using the Content module
- [ ] Add Social Media links to footer

### Phase 5: Connectivity, Communication & Search
- [ ] Implement frontend for "Contact Us" & "Report Issue" forms (Modular, UI matches design vision)
- [ ] Create backend logic to mail and store form submissions
- [ ] Create Admin Panel view for reading submissions
- [ ] **NEW:** Create `Subscriber` model and migration (Modular)
- [ ] **NEW:** Add newsletter subscription form to public footer (UI matches design vision)
- [ ] **NEW:** Implement Admin CRUD for `Subscribers` (Modular)
- [ ] **NEW:** Create Admin interface for composing newsletters
- [ ] **NEW:** Create `Newsletter` Mailable and `SendNewsletterJob`
- [ ] **NEW:** Implement controller logic to dispatch newsletter jobs to the queue
- [ ] Implement Site-Wide Search functionality (Controller and View, Modular, UI matches design vision)

### Phase 6: Finalization & Pre-Launch Polish
- [ ] Refine and apply granular permissions for `Admin` and `Manager` roles
- [ ] Conduct full end-to-end testing
- [ ] Complete user and developer documentation
- [x] Create `FEATURE_ANALYSIS.md` to consolidate system features and flows.
- [x] Add all fetched features to the bottom of `FEATURE_ANALYSIS.md`.

---

## Modular System Folder Structure (to be created for each module)

```
app/Modules/ModuleName/
├── Controllers/
│   └── ModuleNameController.php
├── Models/
│   └── ModuleName.php
├── Policies/
│   └── ModuleNamePolicy.php
├── Requests/
│   └── ModuleNameRequest.php
├── Factories/
│   └── ModuleNameFactory.php
├── Tests/
│   └── Feature/ModuleNameCrudTest.php
├── Views/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
├── routes.php (optional, for module-specific routes)
└── README.md (module documentation)
```

---

## Design Vision Reference
- All frontend UI (admin and public) must follow the "Corporate Clarity with a Human Touch" design vision:
  - Clean, bright, uncluttered layouts with generous whitespace
  - Modern geometric sans-serif fonts (Inter, Manrope, Sora for headings; Inter or Figtree for body)
  - Color palette: Navy Blue (#0A192F), Charcoal Gray (#2D3748), Off-White (#F8F9FA), Teal Green (#2DD4BF), Electric Blue (#3B82F6), Light Gray (#E2E8F0)
  - 12-column grid, asymmetrical layouts for key sections, consistent 4px/8px spacing
  - High-quality, bright imagery and feather-light line icons
  - Microinteractions: gentle button lift, color fade on hover, input highlight, smooth page transitions
  - Cards: 8-12px radius, soft drop shadow

---

## Security Layer (Planned for Future Implementation)
- Centralized security middleware for all modules (rate limiting, IP whitelisting, 2FA, etc.)
- Advanced RBAC: granular permissions per module/action
- Audit logging for all admin actions
- Module-level API authentication (for future API endpoints)
- Security tests for all modules
- Automated vulnerability scanning integration
- Security documentation and best practices in `docs/SECURITY.md`
