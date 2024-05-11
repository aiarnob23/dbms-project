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
        <li><a target="_blank" href="./BookingHistory.php">Booking History</a></li>
      </ul>
    </div>
    <a class="btn btn-ghost text-xl">Travel Agency</a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="home.php">Home</a></li>
      <li><a target="_blank" href="./blogPage.html">Blog</a></li>
      <li><a target="_blank" href="./BookingHistory.php">Booking History</a></li>
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
                            <p>Package in Details: </p>
                            <div class="h-[500px] mx-1 overflow-y-scroll"><p>${package.description}</p></div>
                            <p>Price: $${package.price}</p>
                            <div class="card-actions justify-end">
                           <button onclick="handleBooking(${package.id})" class="BookingBtn btn" data-package-id="${package.id}">Book</button>
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





<!-- --------------footer-------------- -->
<footer class="footer container mx-auto mt-12 rounded-lg p-10 bg-[#3C5B6F] text-white">
  <nav>
    <h6 class="footer-title">Services</h6> 
    <a class="link link-hover">Branding</a>
    <a class="link link-hover">Design</a>
    <a class="link link-hover">Marketing</a>
    <a class="link link-hover">Advertisement</a>
  </nav> 
  <nav>
    <h6 class="footer-title">Company</h6> 
    <a class="link link-hover">About us</a>
    <a class="link link-hover">Contact</a>
    <a class="link link-hover">Jobs</a>
    <a class="link link-hover">Press kit</a>
  </nav> 
  <nav>
    <h6 class="footer-title">Social</h6> 
    <div class="grid grid-flow-col gap-4">
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
    </div>
  </nav>
</footer>




<script>
  const handleBooking = (packageId) => {
    window.location.href = `booking.php?id=${packageId}`;
}
</script>

</body>
</html>