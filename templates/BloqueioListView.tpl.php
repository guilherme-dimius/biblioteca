<?php
	$this->assign('title','SGB | Bloqueios');
	$this->assign('nav','bloqueios');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/bloqueios.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Bloqueios
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="bloqueioCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idbloqueio">Idbloqueio<% if (page.orderBy == 'Idbloqueio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idlivro">Idlivro<% if (page.orderBy == 'Idlivro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Tipobloqueio">Tipobloqueio<% if (page.orderBy == 'Tipobloqueio') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idmovimentacao">Idmovimentacao<% if (page.orderBy == 'Idmovimentacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idbloqueio')) %>">
				<td><%= _.escape(item.get('idbloqueio') || '') %></td>
				<td><%= _.escape(item.get('idlivro') || '') %></td>
				<td><%= _.escape(item.get('tipobloqueio') || '') %></td>
				<td><%= _.escape(item.get('idmovimentacao') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="bloqueioModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idbloqueioInputContainer" class="control-group">
					<label class="control-label" for="idbloqueio">Idbloqueio</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idbloqueio"><%= _.escape(item.get('idbloqueio') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idlivroInputContainer" class="control-group">
					<label class="control-label" for="idlivro">Idlivro</label>
					<div class="controls inline-inputs">
						<select id="idlivro" name="idlivro"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tipobloqueioInputContainer" class="control-group">
					<label class="control-label" for="tipobloqueio">Tipobloqueio</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tipobloqueio" placeholder="Tipobloqueio" value="<%= _.escape(item.get('tipobloqueio') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idmovimentacaoInputContainer" class="control-group">
					<label class="control-label" for="idmovimentacao">Idmovimentacao</label>
					<div class="controls inline-inputs">
						<select id="idmovimentacao" name="idmovimentacao"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteBloqueioButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteBloqueioButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Bloqueio</button>
						<span id="confirmDeleteBloqueioContainer" class="hide">
							<button id="cancelDeleteBloqueioButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteBloqueioButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="bloqueioDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Bloqueio
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="bloqueioModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveBloqueioButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="bloqueioCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newBloqueioButton" class="btn btn-primary">Add Bloqueio</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
