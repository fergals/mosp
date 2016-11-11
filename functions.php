<?php
function getHeader(){
  include ($_SERVER['DOCUMENT_ROOT'].'/admin/header.php');
}

function getFooter() {
  include ($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php');
}

function limitdesc($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . ' [...]';
    echo $y;
  }
}

 ?>
