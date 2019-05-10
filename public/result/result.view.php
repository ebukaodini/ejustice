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
      <h1 class="bg-dark p-2 text-light">
         <a href="#" class="float-left btn btn-info text-light" onclick="goBack()">
            <span class="fa fa-md fa-arrow-left"></span>
         </a>
         <span class="text-info">e</span>Justice
      </h1>
   </header>

   <main class="container">

      <h3 class="text-info">Search Result(s)</h3> <hr>
      
      <div class="table-responsive">
         <table class="table table-sm table-bordered table-striped">
            <tr>
               <th>#</th>
               <th>Badge No.</th>
               <th>Name</th>
               <th>Voice Notes</th>
               <th>View more</th>
            </tr>

            <?=$result->resultView?>
            
         </table>
      </div>

   </main>

</body>
<!-- Web Content End Here -->

<!-- Template Footer -->
<?= $templates->PageFooter(); ?>

<!-- Copy and Paste -->
<?=''?>