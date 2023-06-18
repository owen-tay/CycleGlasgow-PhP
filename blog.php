<?php
session_start();
include('includes/error-reporting.php');
include('includes/connx.php');
include('includes/session-chk-homepage.php');
require_once('couch/cms.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--Header -->
    <?php include('modules/head.php'); ?>
</head>

<body class="flex flex-col min-h-screen">
    <!--Nav -->
    <?php include('includes/navbar.php'); ?>
    <!--main index-->
    <div class="flex flex-wrap justify-center mx-8 md:mx-32 pb-64">
        <cms:pages masterpage='blog-posts.php'>
            <div class="blogCard flex flex-col h-[300px] justify-between border  border-gray-200 hover:border-pink-cycle border-dashed rounded-xl">
                <img src="<cms:show blog_image />" class="h-40 blogimage" alt="<cms:show k_page_title />" />
                <h2 class="text-sm font-bold">
                    <cms:show blog_header />
                </h2>
                <p class="pt-1 text-xs flex-grow">
                    <cms:show blog_summary />
                </p>
                <a class="text-md text-pink-cycle hover:text-blue-cycle transition ease-in-out align-middle items-center"
                    href="<cms:show k_page_link />">
                    <div
                        class="bg-gradient-to-r from-pink-cycle to-blue-cycle w-32 h-9 ml-12  text-white rounded-2xl line text-center pt-1 drop-shadow-lg hoverSize text-lg transition ease-in-out">
                        Read More </div>
                </a>
            </div>
        </cms:pages>
    </div>
    <footer class="bg-gray-100 py-3 mt-96 w-full rounded-t-md">
        <div class="container mx-auto flex flex-col items-center justify-center">
            <div class="flex items-center mb-4">
                <p class="text-gray-600 text-sm mr-4">
                    <script>
                        var currentYear = new Date().getFullYear();
                        document.write(currentYear);
                    </script> | Made By
                </p>
                <img src="images/conjure.svg"
                    class="bg-pink-200 hover:bg-teal-200 rounded-sm w-16 negative-margin transition ease-in-out"
                    alt="Logo" />
                <p class="text-gray-600 text-sm">
                    All Rights Reserved.
                </p>
            </div>
            <div class="flex items-center">
                <a href="blog.php"
                    class="font-bold text-gray-600 text-sm mx-1  hover:text-pink-cycle transition ease-in-out">Blog</a>
                <a href="map.php"
                    class="font-bold text-gray-600 text-sm mx-1  hover:text-pink-cycle transition ease-in-out">Map</a>
                <a href="view-results.php"
                    class="font-bold text-gray-600 text-sm mx-1  hover:text-pink-cycle transition ease-in-out">Listings</a>
            </div>
        </div>
    </footer>
</body>

</html>

<?php COUCH::invoke(); ?>