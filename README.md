<div align="center">
  <a href="https://docs.rhraju.com/phrix-php" target="_blank">
    <img src="https://rhraju.com/assets/img/phrix_logo.png" width="80%" alt="Phrix Logo"/>
  </a>
  <h1>PhriX (A Lightweight PHP Micro Framework)</h1>
  <span>PhriX is a simple, no-bloat PHP micro-framework built for small-to-medium web applications. It offers essential tools like routing, middleware, templating, and basic request/response handling -- nothing more, nothing less.</span>
</div>

### 🛠️ Features
- Clean, chainable routing (`$route->get('/', 'welcome');`)
- Middleware support (`$route->get(...)->middleware('auth');`)
- Simple templating (`@include`, `@asset`, `@title`)
- Request & Response abstraction
- JSON, View, Text, and Redirect response types
- Slug/URL parameter support (`/post/{slug}`)
- Lightweight logging system
- Project boot file (`public/index.php`) < 20 lines
- No unnecessary magic
 
### 🛣️ Why PhriX?
Most PHP frameworks try to be everything. Phrix focuses on only what's essential for early-stage projects:
- Simplicity over features
- Flat structure (everything is where you expect it)
- Readable source (you can skim the whole core in minutes)
- Designed for maintainability and quick iteration

### ✅ Getting Started
Clone the repository and start:

1. `git clone https://github.com/ujarhr/phrix-php`
2. `cd phrix`
3. `composer dump-autoload`
4. `php -S localhost:8000 -t public` 

> Start editing your routes in `config/routes.php`, templates in `app/Views`, and partials in `app/Partials`. You can find complete documentation at:  [**PhriX Docs**](https://docs.rhraju.com/phrix-php)

### 📋 To-Do
- [x] Basic routing (GET/POST)
- [x] Middleware support
- [x] Basic templating
- [x] JSON/text response
- [x] Logging
- [ ] CLI tool (optional)
- [ ] Prefix/group support
- [ ] Dependency injection?

### ⚖️ Credits and License
Built with :heart: by  [Reajul Hasan Raju](https://rhraju.com), reach out to me via email hello@rhraju.com. PhriX is completely open-sourced and licensed under the  [MIT license](https://opensource.org/licenses/MIT).
