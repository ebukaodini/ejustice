<?php 
/**
 * Summary:
 * 
 */
?>

<!-- Template Header -->
<?= $templates->PageHeader(); ?>

<!-- Web Content Start Here -->
<body>
   <header class="text-center sticky-top m-5">
      <h1> <span class="text-info fa fa-bars"></span> <span class="text-info">e</span>Justice</h1>
   </header>

   <main class="container ">

      <h3 class="text-info">Filter Search</h3> <hr>

      <form action="<?=result?>" method="post" class="">

         <label for="_keyword" class="label font-weight-bold">Keywords</label>

         <textarea name="_keyword" id="_keyword" placeholder="Seperate them with commas(,)" class="input form-control"></textarea>

         <br>
         <label for="_badgeNo" class="label font-weight-bold">Officer Badge Number</label>

         <input name="_keyword" id="_badgeNo" placeholder="e.g PO1232" class="input form-control">

         

         <!-- <input type="datetime" name="" id=""> -->

      </form>

   </main>

</body>
<!-- Web Content End Here -->

<!-- Template Footer -->
<?= $templates->PageFooter(); ?>

<!-- Copy and Paste -->
<?=''?>