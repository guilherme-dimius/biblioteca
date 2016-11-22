<?php
	$this->assign('title','SGB | Livros');
	$this->assign('nav','livros');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/livros.js").wait(function(){
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
	<i class="icon-th-list"></i> Livros
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="livroCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idlivro">Idlivro<% if (page.orderBy == 'Idlivro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Anoaquisicao">Anoaquisicao<% if (page.orderBy == 'Anoaquisicao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Retiravel">Retiravel<% if (page.orderBy == 'Retiravel') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Situacao">Situacao<% if (page.orderBy == 'Situacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idisbn">Idisbn<% if (page.orderBy == 'Idisbn') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Idlocalizacao">Idlocalizacao<% if (page.orderBy == 'Idlocalizacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idlivro')) %>">
				<td><%= _.escape(item.get('idlivro') || '') %></td>
				<td><%= _.escape(item.get('anoaquisicao') || '') %></td>
				<td><%= _.escape(item.get('retiravel') || '') %></td>
				<td><%= _.escape(item.get('situacao') || '') %></td>
				<td><%= _.escape(item.get('idisbn') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('idlocalizacao') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="livroModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idlivroInputContainer" class="control-group">
					<label class="control-label" for="idlivro">Idlivro</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idlivro"><%= _.escape(item.get('idlivro') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="anoaquisicaoInputContainer" class="control-group">
					<label class="control-label" for="anoaquisicao">Anoaquisicao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="anoaquisicao" placeholder="Anoaquisicao" value="<%= _.escape(item.get('anoaquisicao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="retiravelInputContainer" class="control-group">
					<label class="control-label" for="retiravel">Retiravel</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="retiravel" placeholder="Retiravel" value="<%= _.escape(item.get('retiravel') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="situacaoInputContainer" class="control-group">
					<label class="control-label" for="situacao">Situacao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="situacao" placeholder="Situacao" value="<%= _.escape(item.get('situacao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idisbnInputContainer" class="control-group">
					<label class="control-label" for="idisbn">Idisbn</label>
					<div class="controls inline-inputs">
						<select id="idisbn" name="idisbn"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idlocalizacaoInputContainer" class="control-group">
					<label class="control-label" for="idlocalizacao">Idlocalizacao</label>
					<div class="controls inline-inputs">
						<select id="idlocalizacao" name="idlocalizacao"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLivroButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLivroButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Livro</button>
						<span id="confirmDeleteLivroContainer" class="hide">
							<button id="cancelDeleteLivroButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLivroButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="livroDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Livro
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="livroModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLivroButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="livroCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newLivroButton" class="btn btn-primary">Add Livro</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
