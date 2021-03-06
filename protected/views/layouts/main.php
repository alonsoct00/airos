<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Aceros Soria</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Gilberto Alonso Caballero Trujano">
    
	<!-- Stylesheets -->

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/kickstart.css" media="all" />                  <!-- KICKSTART -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="all" />  
 
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
  
</head>

<body>

<!-- ===================================== END HEADER ===================================== -->

<!-- ===================================== SLIDER ===================================== -->


<?php 


if(Yii::app()->controller->id.Yii::app()->controller->action->id=='siteindex') {?>
<!--este slider será administrable y aparecerán productos random (Maximo 5 elementos)-->
<div id="slider">
<ul class="slideshow">
<li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sslider1.jpg" width="960" height="600" /></a></li>
<li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sslider2.jpg" width="960" height="600" /></a></li>
<li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sslider3.jpg" width="960" height="600" /></a></li>
<li><a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sslider4.jpg" width="960" height="600" /></a></li>


</ul>
</div>

<?php } ?>

<!-- ===================================== SLIDER ===================================== -->


<!-- ===================================== HEADER-NAVIGATION ===================================== -->
<header>
<div class="sticky_navigation">
<div class="datos">
<span class="telefono icon-phone col_6"> Atención a clientes: 55-5692-1000</span>
<span class="buscador col_6">
<i class="icon-search"></i> <input id="search" type="search" class="icon-search" placeholder="Buscar Producto..." style="width:93%;" /></span></div>
<div class="menu-soria">
<ul>
<li class="logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-top.png" alt="logo"></li>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/nosotros" class="blanco"><li><i class="icon-briefcase"></i><small>Nosotros</small></li></a>
<li>
<a href="https://twitter.com/acerossoria" target="_blank"><i class="icon-twitter"></i></a>
<a href="https://www.facebook.com/acerossoria" target="_blank"><i class="icon-facebook"></i></a>
<a href="https://plus.google.com/114038653456290361525/posts" target="_blank"><i class="icon-google-plus"></i></a>
</li>
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/contacto" class="blanco"><li><i class="icon-envelope-alt"></i><small>Contacto</small></li></a>
<li class="garantia"><i class="icon-truck"></i><small>Garantía de entrega</small></li>
</ul>
</div>
<div class="container-nav">


<?php $modelLineas= Lineas::model()->findAll(array('order'=>'descripcion','condition'=>'descripcion in ("CUADRADOS","Angulos","Lamina","Perfil","PTR","REDONDOS","SOLDADURA MAQUINAS PARA SOLDAR","SOLERAS","TABLERO","TUBERIA","VARILLA","VIGA")')); 


$lista=array();
foreach ($modelLineas as $key => $valueLineas) {
		foreach ($valueLineas->sublineas as $key => $valueSublinea) { 
			     if(!isset($lista[$valueLineas->descripcion])){
                      $lista[$valueLineas->descripcion]=array('linea_id'=>$valueLineas->id,'descripcion'=>$valueLineas->descripcion);
			     }
                 $lista[$valueLineas->descripcion]['sublineas'][]=array('descripcion' =>$valueSublinea->descripcion,'sublinea_id'=>$valueSublinea->id,'linea_id'=>$valueSublinea->linea_id);               
		}	
}

?>

<!--Maximo 10 categorias-->
<a class="toggleMenu blanco" href="#">Categorías</a>
<ul class="nav-li">

<?php

$i=1;

foreach ($lista as $key => $valueLineas) {
	echo '<li class="test" ><a href="#">'.$valueLineas['descripcion'].'</a>';
	
	echo '<ul>';
		foreach ($valueLineas['sublineas'] as $key => $valueSublinea) {
			
			echo '<li><a href="'.Yii::app()->request->baseUrl.'/index.php/Productos/Sublinea/'.$valueSublinea['sublinea_id'].'"  >'.$valueSublinea['descripcion'].'</a></li>';
		}
     echo "</ul></li>";		


   if($i>=9){
   	break;
   } 


       $i++;
}


 ?>
	
</ul>
</div>

</div>
</header>
<!-- ===================================== HEADER-NAVIGATION ===================================== -->







<div class="content shadow">
<div class="grid">
<div class="content-productos">
<div class="col_12">



 <?php echo $content; ?>


</div>
</div>
</div><!-- END GRID-->
</div>






<!-- ===================================== START FOOTER ===================================== -->
<footer>
<div class="col_12">
<span class="copyright">Aceros Soria S.A de C.V 2013 ⎪ Todos los derechos reservados</span>
<span class="menu-footer">
<ul>
<li><a href="privacy.html">Políticas de Privacidad </a><i>⎪</i></li>
<li><a href="terminos.html">Términos y Condicionesa</a><i>⎪</i></li>
<li><a href="bolsadetrabajo.html">Bolsa de Trabajo</a></li>
</ul>
</span>
</div>
</footer>

<?php 
Yii::app()->clientScript->registerPackage('jquery'); 
?>

<!-- ===================================== END FOOTER ===================================== -->

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/kickstart.js"></script>  
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/stickybar.js"></script>  
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>  
</body></html>
