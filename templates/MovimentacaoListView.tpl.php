<?php
	$this->assign('title','SGB | Movimentacoes');
	$this->assign('nav','movimentacoes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/movimentacoes.js").wait(function(){
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
	<i class="icon-th-list"></i> Movimentacoes
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="movimentacaoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idmovimentacao">Idmovimentacao<% if (page.orderBy == 'Idmovimentacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idcpf">Idcpf<% if (page.orderBy == 'Idcpf') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dataentrega">Dataentrega<% if (page.orderBy == 'Dataentrega') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Perdadano">Perdadano<% if (page.orderBy == 'Perdadano') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dataultimarenovacao">Dataultimarenovacao<% if (page.orderBy == 'Dataultimarenovacao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Datadevolucao">Datadevolucao<% if (page.orderBy == 'Datadevolucao') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idlivro">Idlivro<% if (page.orderBy == 'Idlivro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idmovimentacao')) %>">
				<td><%= _.escape(item.get('idmovimentacao') || '') %></td>
				<td><%= _.escape(item.get('idcpf') || '') %></td>
				<td><%if (item.get('dataentrega')) { %><%= _date(app.parseDate(item.get('dataentrega'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('perdadano') || '') %></td>
				<td><%if (item.get('dataultimarenovacao')) { %><%= _date(app.parseDate(item.get('dataultimarenovacao'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%if (item.get('datadevolucao')) { %><%= _date(app.parseDate(item.get('datadevolucao'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('idlivro') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="movimentacaoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idmovimentacaoInputContainer" class="control-group">
					<label class="control-label" for="idmovimentacao">Idmovimentacao</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idmovimentacao"><%= _.escape(item.get('idmovimentacao') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idcpfInputContainer" class="control-group">
					<label class="control-label" for="idcpf">Idcpf</label>
					<div class="controls inline-inputs">
						<select id="idcpf" name="idcpf"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataentregaInputContainer" class="control-group">
					<label class="control-label" for="dataentrega">Dataentrega</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataentrega" type="text" value="<%= _date(app.parseDate(item.get('dataentrega'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="perdadanoInputContainer" class="control-group">
					<label class="control-label" for="perdadano">Perdadano</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="perdadano" placeholder="Perdadano" value="<%= _.escape(item.get('perdadano') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dataultimarenovacaoInputContainer" class="control-group">
					<label class="control-label" for="dataultimarenovacao">Dataultimarenovacao</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="dataultimarenovacao" type="text" value="<%= _date(app.parseDate(item.get('dataultimarenovacao'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="datadevolucaoInputContainer" class="control-group">
					<label class="control-label" for="datadevolucao">Datadevolucao</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="datadevolucao" type="text" value="<%= _date(app.parseDate(item.get('datadevolucao'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteMovimentacaoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteMovimentacaoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Movimentacao</button>
						<span id="confirmDeleteMovimentacaoContainer" class="hide">
							<button id="cancelDeleteMovimentacaoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteMovimentacaoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="movimentacaoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Movimentacao
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="movimentacaoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveMovimentacaoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="movimentacaoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newMovimentacaoButton" class="btn btn-primary">Add Movimentacao</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
