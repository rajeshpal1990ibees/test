<?php
ob_start();
include("include/class.ibees.php");

$obj_ibees = new IbeesClass();
$chk_class= $obj_ibees->call_to_class();

$title=$_GET['title'];
$title = str_replace('.php', '', $title);
$title = str_replace('.html', '', $title);
$title = str_replace("'", "", $title);

$AId=$obj_ibees->MenuID($title);
if($title!='')
{
$id=$AId[0]['id'];
}
else
{
$id='3';
}

$Art=$obj_ibees->articleshow($id);

$show_banner=$obj_ibees->bannershow($id);
$num=count($show_banner);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Content-Type" content="application/xhtml+xml">
<meta name="author" content="Interactivebees.com">
<meta name="description" content="<?php echo $Art[0]['metadescription']; ?>" />
<meta name="keywords" content="<?php echo $Art[0]['metakeyword']; ?>" />
<title><?php echo $Art[0]['metatitle']; ?></title>
<?php include 'head.php';?>
</head>

<body>
  <?php include 'header.php';?>
  
  <section class="inner-banner">
    <div class="">
      <ul>
        <li>
          <img src="<?=$path?>images/banner-products.jpg">
          <div class="shape top"><img src="<?=$path?>images/banner/banner-top.png"></div>
          <div class="shape bottom"><img src="<?=$path?>images/banner/banner-bottom.png"></div>
        </li>
      </ul>
    </div>  
  </section>

<? if($id=='3'){?>

  <section class="folio product-grid">
    <div class="main-container clearfix">
      <div class="main-heading">Products Range</div>
      <div class="product-grid-list">
        <ul class="clearfix">
          
<?
$service=$obj_ibees->TopSubMenu(3);
for($s=0;$s<count($service);$s++)
{ 
if ($s && $s % 2 == 0)
{
$a='right';	
}
else
{
$a='left';	
}
$cont=$obj_ibees->articleshow($service[$s]['id']);
?>
          <li class="aos-item" data-aos="fade-up-<?=$a?>" data-aos-duration="1000">
            <a href="<? if($service[$s1]['article_id']!='0') { ?><? echo $path; ?>products/<? echo str_replace(' ','-',strtolower(trim($service[$s]['alias']))); ?>.html<? } else { echo '#';}  ?>">
              <img src="<?=$path?>image/<?=$cont[0]['img']?>" alt="<?=$service[$s]['hint']?>">
              <span class="product-name"><?=$cont[0]['title']?></span>
            </a>
          </li>
          
<?
}
?>
         
          
          
          
        </ul>
      </div>
      
    </div>
  </section>

<? }else{ ?>
<section class="folio product-view"> 
    <div class="main-container clearfix">
      <div class="main-heading">Products Range</div>
      <div class="product-image-box product-star aos-item" data-aos="fade-right" data-aos-duration="1000">
        <img src="<?=$path?>image/<?=$Art[0]['img']?>">
      </div>
      
      <?=$Art[0]['article_description']?>      
      
    </div>
  </section>
<? } ?>  


  
  <?php include 'footer.php';?>
</body>
</html>
