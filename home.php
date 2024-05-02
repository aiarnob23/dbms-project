<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- playcdn links of tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- link of raw css -->
    <link rel="stylesheet" href="./styles/style.css">
    <!-- playcdn links of daisyui -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.10.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>Document</title>
</head>

<body>

<!-- -------------navbar ----------------- -->
<nav class="container mx-auto">
<div class="navbar bg-base-100">
  <div class="navbar-start">
    <div class="dropdown">
      <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li><a href="home.php">Home</a></li>
        <li><a target="_blank" href="./blogPage.html">Blog</a></li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl">Travel Agency</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="home.php">Home</a></li>
      <li><a target="_blank" href="./blogPage.html">Blog</a></li>
    </ul>
  </div>
  <div class="navbar-end">
    <a class="btn">Contact us</a>
  </div>
</div>
</nav>

<!----------------Header Section -------------->
<section class="container relative my-4 mx-auto">
 <div class="hero h-[600px] rounded-lg" style="background-image: url('./src/images/header.jpg');">
  <div class="hero-overlay bg-opacity-50"></div>
  <div class="hero-content text-center text-neutral-content">
    <div class="max-w-md">
      <h1 class="mb-5 text-5xl font-bold">Backbencher Travel Agency</h1>
    </div>
  </div>
</div>
</section>

<!-- ----------main body------ -->
<!-- ----------main body------ -->
  <!-- Main body section -->
  <main class="container mx-auto">
        <h1 class="text-blue-900 text-3xl font-semibold text-center mt-12 mb-6">Our Packages</h1>
        <div class="grid grid-cols-3 gap-4" id="packages-container"></div>

        <!-- JavaScript to fetch and display packages -->
        <script>
            // Fetch packages from packages.php
            fetch('packages.php')
                .then(response => response.json())
                .then(packages => {
                    // Create HTML for each package and insert into packages-container
                    const packagesContainer = document.getElementById('packages-container');
                    packages.forEach(package => {
                        const packageHTML = `
                            <div class="my-4 ">
                            <div class="card bg-blue-900 text-primary-content">
                            <div class="card-body">
                            <h2 class="card-title">${package.name}</h2>
                            <p>${package.description}</p>
                            <p>Price: $${package.price}</p>
                            <div class="card-actions justify-end">
                             <button class="btn">Description</button>
                            </div>
                            </div>
                            </div>
                            </div>
                        `;
                        packagesContainer.innerHTML += packageHTML;
                    });
                })
                .catch(error => console.error('Error fetching packages:', error));
        </script>
    </main>













<script src="./scripts/script.js"></script>
</body>
</html>