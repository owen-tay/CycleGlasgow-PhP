<?php require_once('couch/cms.php'); ?>
<cms:template title='Blog Post' clonable='1'>
    <cms:editable name='blog_header' label='Blog Header' desc='Enter the header of the blog' type='text' />
    <cms:editable name='blog_image' label='Blog Image' desc='Upload image for the blog' type='image' />
    <cms:editable name='blog_summary' label='Blog Summary' desc='Enter the summary of the blog' type='text' />
    <cms:editable name='blog_content' label='Blog Content' desc='Enter the full content of the blog' type='richtext' />
</cms:template>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('modules/head.php'); ?>
</head>

<body>
    <?php include('includes/navbar.php'); ?>

    <div class="blogHeader blog1 h-56 md:h-80 w-full drop-shadow-2xl" 
         style="background-repeat: no-repeat; background-size: cover; background-position: center; 
                background-image: url('<cms:show blog_image />');">
        <div class=" h-56 md:h-80 w-full bg-gray-700 bg-opacity-60">
            <div class="text-center flex justify-center">
                <h2 class="pt-20 text-2xl md:text-4xl font-bold text-white">
                    <cms:show blog_header />
                </h2>
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-3xl mt-6 p-4">
        <h2 class="text-center text-3xl font-bold mb-4">
            <cms:show blog_header />
        </h2>
        <div class="text-lg leading-relaxed mb-4">
            <cms:show blog_content />
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
<?php COUCH::invoke(); ?>
