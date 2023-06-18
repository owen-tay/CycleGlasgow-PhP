<!--Nav -->
<nav class="bg-gray-100 border-gray-200 px-2 sm:px-4 py-2.5">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center font-bold text-md">
                <img src="images/logo.svg" class="h-8 mr-3 sm:h-9" alt="eRevive" />
                <p class="hover:text-pink-cycle transition ease-in-out">CycleGlasgow </p>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-pink-cycle focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle transition ease-in-out" href="blog.php" class="block py-2 pl-3 pr-4 text-black md:p-0">Blog</a>
                    </li>
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle transition ease-in-out"  href="map.php" class="block py-2 pl-3 pr-4 text-black md:p-0">Map</a>
                    </li>
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle transition ease-in-out" href="view-results.php" class="block py-2 pl-3 pr-4 text-black md:p-0">Listings</a>
                    </li>
                    <li>
                        <a class="hover:text-pink-cycle transition ease-in-out" href="<?php if (!isset($_SESSION['username'])) {
                            echo 'login-start.php';
                        } else {
                            echo 'adminHome.php';
                        } ?>"
                            class="block py-2 pl-3 pr-4 text-black rounded hover:text-pink-cycle md:hover:bg-transparent md:border-0 md:p-0 transition ease-in-out">
                            <?php if (!isset($_SESSION['username'])) {
                                echo 'Login';
                            } else {
                                echo 'Account';
                            } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php if (!isset($_SESSION['username'])) {
                            echo 'login-start.php';
                        } else {
                            echo 'adminHome.php';
                        } ?>"
                            class="block py-2 pl-3 pr-4 text-black rounded hover:text-pink-cycle md:hover:border-0  md:p-0">
                            <?php if (!isset($_SESSION['username'])) {
                            } else {
                                echo '<a class="text-black hover:text-pink-cycle" href="logout.php">Log out</a>';
                            } ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
