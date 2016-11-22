<?php
	$this->assign('title','SGB | Localizacoes');
	$this->assign('nav','localizacoes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/localizacoes.js").wait(function(){
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
	<i class="icon-th-list"></i> Localizacoes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="localizacaoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idlocalizacao">Idlocalizacao<% if (page.orderBy == 'Idlocalizacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Prateleiraposicao">Prateleiraposicao<% if (page.orderBy == 'Prateleiraposicao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Prateleiranumero">Prateleiranumero<% if (page.orderBy == 'Prateleiranumero') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idlocalizacao')) %>">
				<td><%= _.escape(item.get('idlocalizacao') || '') %></td>
				<td><%= _.escape(item.get('prateleiraposicao') || '') %></td>
				<td><%= _.escape(item.get('prateleiranumero') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="localizacaoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idlocalizacaoInputContainer" class="control-group">
					<label class="control-label" for="idlocalizacao">Idlocalizacao</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idlocalizacao"><%= _.escape(item.get('idlocalizacao') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="prateleiraposicaoInputContainer" class="control-group">
					<label class="control-label" for="prateleiraposicao">Prateleiraposicao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="prateleiraposicao" placeholder="Prateleiraposicao" value="<%= _.escape(item.get('prateleiraposicao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="prateleiranumeroInputContainer" class="control-group">
					<label class="control-label" for="prateleiranumero">Prateleiranumero</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="prateleiranumero" placeholder="Prateleiranumero" value="<%= _.escape(item.get('prateleiranumero') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLocalizacaoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLocalizacaoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Localizacao</button>
						<span id="confirmDeleteLocalizacaoContainer" class="hide">
							<button id="cancelDeleteLocalizacaoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLocalizacaoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="localizacaoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Localizacao
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="localizacaoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLocalizacaoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="localizacaoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newLocalizacaoButton" class="btn btn-primary">Add Localizacao</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
