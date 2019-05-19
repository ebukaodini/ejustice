<?php
/**
 * Summary:
 * 
 */

class Template
{
   
   public function showSample($parameter1 = null, $parameter2 = null){
      $template = <<<HTML
      <h4>
         <div>
            Sample Template ready to be imported into any Page <br>
            These Parameters: '{$parameter1}' and '{$parameter2}' were passed to this Template. <br>
            Try out another template; Its not hard.
         </div>
      </h4>
HTML;

      return $template;
   }

   public function PageHeader($pageTitle = "Init Full Stack" ){
      $template = <<<HTML
      <!DOCTYPE html>
      <html>
      <head>
         <meta charset="utf-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <title> {$pageTitle} </title>
         <meta name="viewport" content="width=device-width, initial-scale=1">

         <!-- Bootstrap -->
         <link rel="stylesheet" type="text/css" media="screen" href="../../library/vendor/bootstrap/https_maxcdn.bootstrapcdn.com_bootstrap_4.1.0_css_bootstrap.min.css" />
         <script src="../../library/vendor/bootstrap/https_maxcdn.bootstrapcdn.com_bootstrap_4.1.0_js_bootstrap.min.js"></script>
         <script src="../../library/vendor/bootstrap/https_cdnjs.cloudflare.com_ajax_libs_popper.js_1.14.0_umd_popper.min.js"></script>

         <!-- JQuery -->
         <script src="../../library/vendor/jquery/https_ajax.googleapis.com_ajax_libs_jquery_3.3.1_jquery.min.js"></script>

         <!-- Font Awesome -->
         <link rel="stylesheet" type="text/css" media="screen" href="../../library/vendor/fontawesome/webfont-css/css/fontawesome-all.css" />

         <!-- Javascript -->
         <script src="../@assets/js/main.js"></script>

      </head>
HTML;

      return $template;
   }

   public function PageFooter(){
      $template = <<<HTML
      </html>

      <footer class="text-center m-5">
         <h5>&reg; Powered by Init</h5>
      </footer>
HTML;

      return $template;
   }

   public function renderResult(array $results){
      $resultCount = count($results);
      $template = "";
      
      for ($i=0; $i < $resultCount; $i++) { 
         $id = $i+1;
         $badge = $results[$i]['officer_badge_no'];
         $name = "-";
         $tText = $results[$i]['translated_text'];
         $flag = $results[$i]['flag'];
         $recordId = $results[$i]['id'];
         $audioSrc = "<audio controls type='audio/wav' src='" . ROOT . "/" . $results[$i]['record_url'] . "'></audio>";

         $resultPage = result;

         $template .= <<<HTML
         <tr>
            <td>{$id}</td>
            <td>{$badge}</td>
            <td>{$name}</td>
            <td>{$tText}</td>
            <td>{$audioSrc}</td>
            <td>{$flag}</td>
            <td>
               <form action="{$resultPage}" method="post">
               <select name="_flags" id="_flags" value="{$flag}" class="">
                  <option value="unverified">Unverified</option>
                  <option value="pending">Pending</option>
                  <option value="bad">Bad</option>
                  <option value="okay">Okay</option>
               </select>
               <input type="hidden" name="_recordId" value="{$recordId}">
               <input type="submit" value="Go" name="_updateFlag" class="btn btn-sm btn-info text-light">
               </form>
            </td>
         </tr>
HTML;
      }

      return $template;
   }

   public function renderError($message){
      $template = <<<HTML
      <div class="bg-danger text-light p-1 mb-1 font-weight-bold text-center"> {$message} </div>
HTML;

      return $template;
   }

   public function renderSuccess($message){
      $template = <<<HTML
      <div class="bg-success text-light p-1 mb-1 font-weight-bold text-center"> {$message} </div>
HTML;

      return $template;
   }

}

$templates = new Template();

?>