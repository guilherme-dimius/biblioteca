<?php
	$this->assign('title','SGB | Reservas');
	$this->assign('nav','reservas');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/reservas.js").wait(function(){
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
	<i class="icon-th-list"></i> Reservas
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="reservaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Dreserva">Dreserva<% if (page.orderBy == 'Dreserva') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dcpf">Dcpf<% if (page.orderBy == 'Dcpf') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dlivro">Dlivro<% if (page.orderBy == 'Dlivro') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('dreserva')) %>">
				<td><%= _.escape(item.get('dreserva') || '') %></td>
				<td><%= _.escape(item.get('dcpf') || '') %></td>
				<td><%= _.escape(item.get('dlivro') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="reservaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="dreservaInputContainer" class="control-group">
					<label class="control-label" for="dreserva">Dreserva</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="dreserva"><%= _.escape(item.get('dreserva') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dcpfInputContainer" class="control-group">
					<label class="control-label" for="dcpf">Dcpf</label>
					<div class="controls inline-inputs">
						<select id="dcpf" name="dcpf"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dlivroInputContainer" class="control-group">
					<label class="control-label" for="dlivro">Dlivro</label>
					<div class="controls inline-inputs">
						<select id="dlivro" name="dlivro"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteReservaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteReservaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Reserva</button>
						<span id="confirmDeleteReservaContainer" class="hide">
							<button id="cancelDeleteReservaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteReservaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="reservaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Reserva
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="reservaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveReservaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="reservaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newReservaButton" class="btn btn-primary">Add Reserva</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
