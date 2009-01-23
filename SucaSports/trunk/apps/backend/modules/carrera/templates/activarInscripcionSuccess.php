<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

	<h1><?php echo __('carrera list', 
	array()) ?></h1>
	
	<div id="sf_admin_header">
		<?php if ($sf_request->hasError('delete')): ?>
		<div class="form-errors">
		  <h2><?php echo __('Could not delete the selected %name%', array('%name%' => 'Carrera')) ?></h2>
		  <ul>
		    <li><?php echo __($sf_request->getError('delete')) ?></li>
		  </ul>
		</div>
		<?php elseif ($sf_user->hasFlash('notice')): ?>
		<div class="save-ok">
		 <h2><?php echo __($sf_user->getFlash('notice')) ?></h2>
		</div>
		<?php endif; ?>
	</div>
	
	<div id="sf_admin_bar">
	</div>
	
	<div id="sf_admin_content">
		<?php if (!$pager->getNbResults()): ?>
		 <?php echo __('no result') ?>
		<?php else: ?>
			<table cellspacing="0" class="sf_admin_list">
			<thead>
			<tr>
			<?php include_partial('list_th_tabular') ?>
			</tr>
			</thead>
			<tfoot>
			<tr><th colspan="8">
			<div class="float-right">
			<?php if ($pager->haveToPaginate()): ?>
			  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/first.png', array('align' => 'absmiddle', 'alt' => __('First'), 'title' => __('First'))), 'carrera/list?page=1') ?>
			  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', array('align' => 'absmiddle', 'alt' => __('Previous'), 'title' => __('Previous'))), 'carrera/list?page='.$pager->getPreviousPage()) ?>
			
			  <?php foreach ($pager->getLinks() as $page): ?>
			    <?php echo link_to_unless($page == $pager->getPage(), $page, 'carrera/list?page='.$page) ?>
			  <?php endforeach; ?>
			
			  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', array('align' => 'absmiddle', 'alt' => __('Next'), 'title' => __('Next'))), 'carrera/list?page='.$pager->getNextPage()) ?>
			  <?php echo link_to(image_tag(sfConfig::get('sf_admin_web_dir').'/images/last.png', array('align' => 'absmiddle', 'alt' => __('Last'), 'title' => __('Last'))), 'carrera/list?page='.$pager->getLastPage()) ?>
			<?php endif; ?>
			</div>
			<?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults()) ?>
			</th></tr>
			</tfoot>
			<tbody>
			<?php $i = 1; foreach ($pager->getResults() as $carrera): $odd = fmod(++$i, 2) ?>
			<tr class="sf_admin_row_<?php echo $odd ?>">
		    <td><?php echo link_to($carrera->getId() ? $carrera->getId() : __('-'), 'carrera/edit?id='.$carrera->getId()) ?></td>
		    <td><?php echo $carrera->getNombre() ?></td>
	      <td><?php echo $carrera->getUrl() ?></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
		<?php endif; ?>
		<ul class="sf_admin_actions">
		  <li><?php echo button_to(__('create'), 'carrera/create', array ('class' => 'sf_admin_action_create',)) ?></li>
		</ul>
	</div>
	
	<div id="sf_admin_footer">

	</div>
	
</div>
