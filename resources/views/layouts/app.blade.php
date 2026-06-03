<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Muhammad Dhiyauddin — Network Engineer</title>
  <meta name="description" content="Portfolio Muhammad Dhiyauddin — Network Engineer berbasis di Tangerang." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:wght@400;500&family=Sora:wght@300;400;600;700&display=swap" rel="stylesheet" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<canvas id="network-canvas"></canvas>

<nav>
  <span class="nav-logo"> > My Portfolio < </span>
  <ul class="nav-links">
    <li><a href="#about">about</a></li>
    <li><a href="#projects">projects</a></li>
    <li><a href="#experience">experience</a></li>
    <li><a href="#contact">contact</a></li>
  </ul>
</nav>

@yield('content')

<footer>
  <span>&copy; 2026 Muhammad Dhiyauddin</span>
</footer>

</body>
</html>