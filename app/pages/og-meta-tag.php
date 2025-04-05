<?php
   if (!empty($URL[1])) {
      $metaTagsData = generateMetaTags($URL)
      //echo $metaTagsData['title'];
?>


<!-- Facebook Meta Tags --> 
<meta property="og:type" content="article">
<meta property="og:url" content="<?=ROOT?>/<?= $metaTagsData['ogUrl'] ?>">
<meta property="og:type" content="<?= $metaTagsData['ogType'] ?>">
<meta property="og:title" content="<?= $metaTagsData['title'] ?>">
<meta property="og:description" content="<?= $metaTagsData['description'] ?>">
<meta property="og:image" content="<?=ROOT?>/<?= $metaTagsData['image'] ?>">


<meta property="og:image:style" content="vertical">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="<?= $metaTagsData['twitterCard'] ?>">
<meta property="twitter:domain" content="<?= $metaTagsData['twitterDomain'] ?>">
<meta property="twitter:url" content="<?= $metaTagsData['ogUrl'] ?>">
<meta name="twitter:title" content="<?= $metaTagsData['title'] ?>">
<meta name="twitter:description" content="<?= $metaTagsData['description'] ?>">
<meta name="twitter:image" content="<?=ROOT?>/<?= $metaTagsData['image'] ?>">  

<?php  }  ?>