<?php
	$this->assign('title','SGB | CategoriaLivros');
	$this->assign('nav','categorialivros');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/categorialivros.js").wait(function(){
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
	<i class="icon-th-list"></i> CategoriaLivros
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="categoriaLivroCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idisbn">Idisbn<% if (page.orderBy == 'Idisbn') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Autornome">Autornome<% if (page.orderBy == 'Autornome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Assunto">Assunto<% if (page.orderBy == 'Assunto') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Qtdexemplaresdisponiveis">Qtdexemplaresdisponiveis<% if (page.orderBy == 'Qtdexemplaresdisponiveis') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Qtdpaginas">Qtdpaginas<% if (page.orderBy == 'Qtdpaginas') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Anopublicacao">Anopublicacao<% if (page.orderBy == 'Anopublicacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Edicao">Edicao<% if (page.orderBy == 'Edicao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Descricaolivro">Descricaolivro<% if (page.orderBy == 'Descricaolivro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Qtdexemplares">Qtdexemplares<% if (page.orderBy == 'Qtdexemplares') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Editoranome">Editoranome<% if (page.orderBy == 'Editoranome') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Titulolivro">Titulolivro<% if (page.orderBy == 'Titulolivro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idisbn')) %>">
				<td><%= _.escape(item.get('idisbn') || '') %></td>
				<td><%= _.escape(item.get('autornome') || '') %></td>
				<td><%= _.escape(item.get('assunto') || '') %></td>
				<td><%= _.escape(item.get('qtdexemplaresdisponiveis') || '') %></td>
				<td><%= _.escape(item.get('qtdpaginas') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('anopublicacao') || '') %></td>
				<td><%= _.escape(item.get('edicao') || '') %></td>
				<td><%= _.escape(item.get('descricaolivro') || '') %></td>
				<td><%= _.escape(item.get('qtdexemplares') || '') %></td>
				<td><%= _.escape(item.get('editoranome') || '') %></td>
				<td><%= _.escape(item.get('titulolivro') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="categoriaLivroModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idisbnInputContainer" class="control-group">
					<label class="control-label" for="idisbn">Idisbn</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idisbn" placeholder="Idisbn" value="<%= _.escape(item.get('idisbn') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="autornomeInputContainer" class="control-group">
					<label class="control-label" for="autornome">Autornome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="autornome" placeholder="Autornome" value="<%= _.escape(item.get('autornome') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="assuntoInputContainer" class="control-group">
					<label class="control-label" for="assunto">Assunto</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="assunto" placeholder="Assunto" value="<%= _.escape(item.get('assunto') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="qtdexemplaresdisponiveisInputContainer" class="control-group">
					<label class="control-label" for="qtdexemplaresdisponiveis">Qtdexemplaresdisponiveis</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="qtdexemplaresdisponiveis" placeholder="Qtdexemplaresdisponiveis" value="<%= _.escape(item.get('qtdexemplaresdisponiveis') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="qtdpaginasInputContainer" class="control-group">
					<label class="control-label" for="qtdpaginas">Qtdpaginas</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="qtdpaginas" placeholder="Qtdpaginas" value="<%= _.escape(item.get('qtdpaginas') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="anopublicacaoInputContainer" class="control-group">
					<label class="control-label" for="anopublicacao">Anopublicacao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="anopublicacao" placeholder="Anopublicacao" value="<%= _.escape(item.get('anopublicacao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="edicaoInputContainer" class="control-group">
					<label class="control-label" for="edicao">Edicao</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="edicao" placeholder="Edicao" value="<%= _.escape(item.get('edicao') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descricaolivroInputContainer" class="control-group">
					<label class="control-label" for="descricaolivro">Descricaolivro</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="descricaolivro" placeholder="Descricaolivro" value="<%= _.escape(item.get('descricaolivro') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="qtdexemplaresInputContainer" class="control-group">
					<label class="control-label" for="qtdexemplares">Qtdexemplares</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="qtdexemplares" placeholder="Qtdexemplares" value="<%= _.escape(item.get('qtdexemplares') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="editoranomeInputContainer" class="control-group">
					<label class="control-label" for="editoranome">Editoranome</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="editoranome" placeholder="Editoranome" value="<%= _.escape(item.get('editoranome') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titulolivroInputContainer" class="control-group">
					<label class="control-label" for="titulolivro">Titulolivro</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titulolivro" placeholder="Titulolivro" value="<%= _.escape(item.get('titulolivro') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCategoriaLivroButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCategoriaLivroButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete CategoriaLivro</button>
						<span id="confirmDeleteCategoriaLivroContainer" class="hide">
							<button id="cancelDeleteCategoriaLivroButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCategoriaLivroButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="categoriaLivroDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit CategoriaLivro
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="categoriaLivroModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCategoriaLivroButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="categoriaLivroCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCategoriaLivroButton" class="btn btn-primary">Add CategoriaLivro</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
