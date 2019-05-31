<?php 
/**
 * Summary:
 * 
 */
?>

<!-- Template Header -->
<?= $templates->PageHeader("Search | eJustice"); ?>

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

   <main class="container ">

      <h3 class="text-info">Filter Search</h3> <hr>

      <form action="<?=result?>" method="post" class="">

         <div class="row">
            <div class="col-12">
               <label for="_keyword" class="label font-weight-bold">Keywords</label>

               <textarea name="_keyword" id="_keyword" disabled placeholder="Seperate them with commas(,)" class="input form-control"></textarea>
            </div>

            <!-- <div class="col-2 mt-4">
               <input type="button" value="Save Keywords" class="btn btn-sm btn-info m-1"><br>
               <input type="button" value="Load Keywords" class="btn btn-sm btn-info m-1">
            </div> -->
            

         </div>
         
         <div class="row mt-4">
            <div class="col-4">
               <label for="_badgeNo" class="label font-weight-bold">Officer Badge Number</label>
               <input name="_badgeNo" disabled id="_badgeNo" value="PO001" placeholder="e.g PO1232" class="input form-control">
            </div>

            <div class="col-3">
               <label for="_startDate" class="label font-weight-bold">Start Date</label>
               <input type="datetime" disabled placeholder="2019-05-10 03:00:00" name="_startDate" id="_startDate" class="input form-control">
            </div>

            <div class="col-3">
               <label for="_endDate" class="label font-weight-bold">End Date</label>
               <input type="datetime" disabled placeholder="2019-05-10 03:00:00" name="_endDate" id="_endDate" class="input form-control">
            </div>

            <div class="col-2">
               <label for="_strict" class="label font-weight-bold">Strict Search</label>
               <input type="checkbox" disabled name="_strict" id="_strict" class="input custom-checkbox custom-control">
            </div>
         
         </div>
        
         <input type="submit" name="_search" value="Search" class="btn btn-info btn-md font-weight-bold mt-3">
         <!-- <span style="font-size:20px;" class="font-italic font-weight-bold">
            <span class="fa fa-chevron-left fa-chevron-left fa-chevron-left"></span>
            <span class="fa fa-chevron-left fa-chevron-left fa-chevron-left"></span>
            <span class="fa fa-chevron-left fa-chevron-left fa-chevron-left"></span>
            <span>Click Here</span>
         </span> -->
         
         <!-- </span><span class="fa fa-chevron-left"></span><span class="fa fa-chevron-left"></span> -->
         <!-- <input type="datetime" name="" id=""> -->

      </form>

   </main>

</body>
<!-- Web Content End Here -->

<!-- Template Footer -->
<?= $templates->PageFooter(); ?>

<!-- Copy and Paste -->
<?=''?>