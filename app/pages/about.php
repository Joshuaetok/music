<body>

  <?php require page('includes/header')?>

  <style>
  /* ============================== GENERAL POST ====== */
.post__thumbnail {
  border-radius: var(--card-border-radius-5) 0;
  border: 1rem solid var(--color-gray-900);
  overflow: hidden;
  margin-bottom: 1.6rem;
}

.post:hover .post__thumbnail img {
  filter: saturate(0);
  transition: 500ms ease;
}


  
    /* ============================== FEATURED ====== */

.featured {
  margin-top: 8rem;
}

.featured__container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4rem;
}

.featured .post__thumbnail {
  height: fit-content;
}

        

        .content-wrapper p::first-letter {
            font-size: 1.5em; /* Adjust the size as needed */
            font-weight: bold; /* Optional: Make the first letter bold */
        }




/* ============================== MEDIA QUERIES (MEDIUM DEVICES)====== */
@media screen and (max-width: 1024px) {
  /* ========== GENERAL============== */
  .container {
    width: var(--container-width-md);
  }
  
  .featured__container {
    gap: 3rem
  }
  .posts__container {
    grid-template-columns: 1fr 1fr;
    gap: 3rem;
  }

/* ============================== MEDIA QUERIES (SMALL DEVICES)====== */

@media screen and (max-width: 600px) {
  section {
    margin-top: 2rem;
  }
  h1 {
    font-size: 2rem;
  }
  
  .featured {
    margin-top: 6rem;
  }
  
  .featured__container {
    grid-template-columns: 1fr;
    gap: 0;
  }
  
  .posts__container {
    grid-template-columns: 1fr;
  }  

  </style>




<section class="featured">
     <div class="container featured__container">
       <div class="post__thumbnail">
         <img src="<?=ROOT?>/assets/images/about.jpg">
       </div>
       <div class="post__info">
      <!--   <a href="category-posts.html" class="category__button">Wild Life</a> -->
         <h2 class="post__title"><a href="#">About</a></h2>
         
      <div class="content-wrapper">
         <p class="post__body" style="text-align: justify; word-spacing: 2px; hyphens: auto;">
          Welcome to the captivating world of Emmanuel Ajala, where soul-stirring melodies and unwavering faith intertwine to create a musical experience like no other. Since 1997, I have been enchanting audiences with my exceptional musical talents, establishing myself as a true maestro in the industry.
<br>
<br>
As the eldest of three siblings, my musical journey began at a young age as a chorister, where I embarked on a path of musical discovery and growth. With unwavering dedication and relentless practice, I mastered various instruments including the drums, guitar, and keyboard, allowing me to express myself through a wide range of sounds and rhythms.
<br>
<br>
With a remarkable ability to blend academic prowess with artistic expression, I achieved an HND in mechanical engineering - a testament to my multidimensional talents. This fusion of technical expertise and creative flair brings a unique depth and richness to my music, setting me apart as an artist.
<br>
<br>
Embracing diversity and embracing the power of music as a universal language, my discography spans a myriad of genres and themes. From the evocative "Wait for your time" to the anthemic "Pray for naija," my songs resonate deeply with themes of faith, love, and resilience. Each track is carefully crafted to inspire and uplift, touching the hearts of listeners across the globe.
<br>
<br>
My driving passion lies in inspiring others through my music. I believe in the profound impact that melodies and lyrics can have on people's lives, offering solace and motivation during otherwise trying times. My vision extends beyond borders, as I strive to create a harmonious blend of talent and inspiration that transcends cultural boundaries.
<br>
<br>
Journey into the magic of Ajala Africa, and you will discover a world where captivating rhythms and heartfelt lyrics collide. Experience the power of music that transcends mere entertainment and instead becomes a force for unity, healing, and joy. Allow the enchanting melodies to lift your spirits, the heartfelt lyrics to touch your soul, and the magic of my artistry to transport you to a realm where talent and inspiration converge.
<br>
<br>
Come, be a part of this extraordinary musical adventure, and together, let's create a harmonious world where the power of music becomes a guiding light for all who listen. Welcome to the world of Emmanuel Ajala - a sanctuary of soulful melodies and unwavering faith.
          </p>
       </div>
     </div>
   </div>
   </section>

  <?php require page('includes/footer')?>

</body>

</html>
