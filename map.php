<?php session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk-homepage.php');

$date = date('d-m-y H:i:s');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--Header -->
    <?php include('modules/head.php'); ?>
</head>

<body>
    <!--Nav -->
    <nav class="bg-gray-100 border-gray-200 px-2 sm:px-4 py-2.5">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="index.php" class="flex items-center font-bold text-md">
                <img src="images/Logo.svg" class="h-8 mr-3 sm:h-9" alt="eRevive" />
                <p class="hover:text-pink-cycle">CycleGlasgow </p>
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
                    class="flex flex-col p-4 mt-4 rounded-lg bg-ereviveGreen md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle" href="blog.php" class="block py-2 pl-3 pr-4 text-black md:p-0">Blog</a>
                    </li>
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle"  href="map.php" class="block py-2 pl-3 pr-4 text-black md:p-0">Map</a>
                    </li>
                    <li class="hover:text-pink-cycle">
                        <a class="hover:text-pink-cycle" href="view-results.php" class="block py-2 pl-3 pr-4 text-black md:p-0">Listings</a>
                    </li>
                    <li>
                        <a class="hover:text-pink-cycle" href="<?php if (!isset($_SESSION['username'])) {
                            echo 'login-start.php';
                        } else {
                            echo 'adminHome.php';
                        } ?>"
                            class="block py-2 pl-3 pr-4 text-black rounded hover:text-pink-cycle md:hover:bg-transparent md:border-0 md:p-0">
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
                                echo '<a class="text-black" href="logout.php">Log out</a>';
                            } ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--map-->
    <h1 class="p-5 text-2xl md:text-2xl font-bold text-black text-center">
        Glagows New Cycle Paths
    </h1>
    <div id="map"></div>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoib3dldGF5bG9yZGV2IiwiYSI6ImNsaGk0amszMTA0Y3YzZG8xdWRpa3M1cHMifQ.Hzts__it_T656nhUJgQUpA';

        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [-4.2518, 55.8642], // starting position for Glasgow [lng, lat]
            zoom: 12 // starting zoom
        });

        map.on('load', function () {
            // Define marker points and add them to the map
            const markerPoints = [
                [-4.2518, 55.8642], [-4.2618, 55.8742], [-4.2718, 55.8842], // Markers 1-3
                [-4.2818, 55.8942], [-4.2918, 55.9042], [-4.3018, 55.9142], // Markers 4-6
                [-4.3118, 55.9242], [-4.3218, 55.9342], [-4.3318, 55.9442], // Markers 7-9
                [-4.3418, 55.9542] // Marker 10
            ];

            for (let i = 0; i < markerPoints.length; i++) {
                new mapboxgl.Marker().setLngLat(markerPoints[i]).addTo(map);
            }

            // Define line points
            const linePoints = [
                [[-4.2518, 55.8642], [-4.2618, 55.8742], [-4.2718, 55.8842]], // Line 1
                [[-4.2818, 55.8942], [-4.2918, 55.9042], [-4.3018, 55.9142]], // Line 2
                [[-4.3118, 55.9242], [-4.3218, 55.9342], [-4.3318, 55.9442]]  // Line 3
            ];

            // Line colors
            const lineColors = ['red', 'blue', 'green'];

            // Add each line as a separate source and layer
            for (let i = 0; i < linePoints.length; i++) {
                map.addSource(`line${i}`, {
                    'type': 'geojson',
                    'data': {
                        'type': 'Feature',
                        'properties': {},
                        'geometry': {
                            'type': 'LineString',
                            'coordinates': linePoints[i]
                        }
                    }
                });

                map.addLayer({
                    'id': `line${i}`,
                    'type': 'line',
                    'source': `line${i}`,
                    'layout': {},
                    'paint': {
                        'line-color': lineColors[i],
                        'line-width': 2
                    }
                });
            }
        });
    </script>



    <footer class="bg-gray-100 py-6 mt-2  bottom-0 w-full">
        <div class="container mx-auto flex justify-center items-center ">
            <div class="flex items-center">
                <p class="text-gray-600 text-sm mr-4">
                    <script>
                        var currentYear = new Date().getFullYear();
                        document.write(currentYear);
                    </script> | Made By
                </p>
                <img src="images/conjure.svg"
                    class="bg-pink-200 hover:bg-teal-200  rounded-sm w-16 negative-margin transition ease-in-out"
                    alt="Logo" />
                <p class="text-gray-600 text-sm">
                    All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>