# Developer Documentation

This document provides technical details about the application architecture, modules, and development practices.

## 1. Technical Architecture Overview
The application is a PHP-based modular monolith built on the Laravel Framework. It utilizes a standard LEMP stack (Linux, Nginx, MySQL, PHP). The frontend is rendered server-side using Blade templates, enhanced with jQuery and custom CSS for interactivity and styling.

### Core Design Principles:
- Modular Architecture: Each business domain (Products, Services, Users, etc.) is encapsulated within its own module in `app/Modules`.
- Role-Based Access Control (RBAC): Security is managed by the `spatie/laravel-permission` package.
- Dynamic Content Engine: The frontend, especially the home page, is driven by a database schema for dynamic sections.
- Test-Driven Development (TDD): Feature and unit tests are written for all modules.

## 2. Modules
- /app/Modules/Admin: Admin dashboard and global settings.
- /app/Modules/User: Users, roles, and permissions.
- /app/Modules/Content: Dynamic content sections.
- /app/Modules/Product: Product CRUD.
- /app/Modules/Service: Service CRUD.
- /app/Modules/Contact: Contact/Issue submissions.
- /app/Modules/Portfolio: Portfolio projects.
- /app/Modules/Career: Job postings.
- /app/Modules/Blog: Blog posts.
- /app/Modules/Newsletter: Newsletter subscribers and delivery.

## 3. API Endpoints
(To be documented as developed)
