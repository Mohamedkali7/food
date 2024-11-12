<?php
function getTitle (){
   global $PageTitle;

   if(isset($PageTitle)){

    echo $PageTitle;

     } else{
    echo'Default';

   }
} 
