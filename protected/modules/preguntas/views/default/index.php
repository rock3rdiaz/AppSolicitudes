<script type="text/javascript" charset="utf-8" async defer>
	window.setTimeout(function(){location.reload(true)}, 120000);
</script>

<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h3 class="h1_titulos">Bienvenido(a) <span class="nombre_bienvenida"><?php echo strtoupper(Yii::app()->getSession()->get('nombre'));?></h3>

<br/>
<p class="noticias_bienvenida">Los siguientes datos le ofrecen una visi&oacute;n general de su trabajo con este aplicativo.</p>

<br/>

<ul>
	<li><p class="datos_generales">Hasta la fecha usted ha enviado un total de <?php echo '<span class="badge badge-info">'.($total_solicitudes_enviadas).'</span>'?> solicitudes.</p>
	</li>

	<li><p class="datos_generales">Ha recibido un total de <?php echo '<span class="badge badge-success">'.($total_respuestas_recibidas).'</span>'?> respuestas.</p>
	</li>

	<li><p class="datos_generales">Tiene <?php echo '<span class="badge badge-important">'.($total_solicitudeS_por_calificar).'</span>'?> respuestas aun sin puntuar. Por favor env&iacute;e sus puntajes. <br/> Recuerde que si &eacute;ste indicador llega a 3 no podr&aacute; continuar enviando solicitudes.</p>
	</li>
</ul>

