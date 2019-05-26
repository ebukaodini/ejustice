<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <form action="../@api/push.php" method="post" enctype="multipart/form-data" >
      <!-- success test -->
      <div>
         <h4>Success Test</h4>
         <p>officer_badge_no: PO001</p>
         <!-- <p>translated_text: Hey babe, shey you know say you set gan</p> -->
         <p>start_time: 2019-05-15 03:44:00</p>
         <p>end_time: 2019-05-15 03:44:00</p>
      </div>
      <br><br><br>
      <!-- failure test -->
      <div>
         <h4>Failure Test</h4>
         <p>officer_badge_no: PO01</p>
         <p>officer_badge_no: PO0O1</p>
         <p>officer_badge_no: 001</p>
         <p>officer_badge_no: </p>
         <!-- <p>translated_text: </p> -->
         <p>start_time: 03:44:00</p>
         <p>start_time: 2019-05-15</p>
         <p>end_time: 03:44:00</p>
         <p>end_time: 2019-05-15</p>
      </div>
      <br><br><br>
      
      <!-- send -->
      <input type="file" name="recording" />
      <input type="text" name="officer_badge_no" placeholder="officer_badge_no" value='PO001' />
      <!-- <input type="text" name="translated_text" placeholder="translated_text"  value='Hey babe, shey you know say you set gan' /> -->
      <input type="text" name="start_time" placeholder="start_time" value='2019-05-15 03:44:00' />
      <input type="text" name="end_time" placeholder="end_time" value='2019-05-15 03:44:00' />
      <input type="submit" value="Post">
   </form>
</body>
</html>

<?php ?>