@title('PhriX - a lightweight micro-framework')
@include('partials/header')

<body>
    <img src="@asset('images/phrix_logo.png')" alt="Phrix Logo" class="logo">
    <h1>Welcome to PhriX v1.0</h1>
    <p>
        A lightweight, simple, no-bloat PHP micro-framework perfect for quick MVPs, APIs, or minimal web apps. It offers essential tools like routing, middleware, templating, and basic request/response handling-- nothing more, nothing less.
    </p>

    <p>Edit routes in <code>config/routes.php</code>
        and create your views in <code>app/Views/pages</code>.</p>

    <div class="links">
        <a href="https://github.com/ujarhr/phrix-php" target="_blank">View on GitHub</a>
        <a href=" https://docs.rhraju.com/phrix-php" target="_blank">Read the Docs</a>
    </div>

    <ul class=" features">
        <li>⚡ Lightning fast</li>
        <li>🛠️ Minimal setup</li>
        <li>🔥 Simple routing</li>
        <li>🔒 Middleware support</li>
        <li>🎨 Templating</li>
        <li>🧩 No bloat, just pure PHP</li>
    </ul>

    @include('partials/footer')

</body>

</html>