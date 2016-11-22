/**
 * backbone model definitions for SGB
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 5000;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Bloqueio Backbone Model
 */
model.BloqueioModel = Backbone.Model.extend({
	urlRoot: 'api/bloqueio',
	idAttribute: 'idbloqueio',
	idbloqueio: '',
	idlivro: '',
	tipobloqueio: '',
	idmovimentacao: '',
	defaults: {
		'idbloqueio': null,
		'idlivro': '',
		'tipobloqueio': '',
		'idmovimentacao': ''
	}
});

/**
 * Bloqueio Backbone Collection
 */
model.BloqueioCollection = model.AbstractCollection.extend({
	url: 'api/bloqueios',
	model: model.BloqueioModel
});

/**
 * CategoriaLivro Backbone Model
 */
model.CategoriaLivroModel = Backbone.Model.extend({
	urlRoot: 'api/categorialivro',
	idAttribute: 'idisbn',
	idisbn: '',
	autornome: '',
	assunto: '',
	qtdexemplaresdisponiveis: '',
	qtdpaginas: '',
	anopublicacao: '',
	edicao: '',
	descricaolivro: '',
	qtdexemplares: '',
	editoranome: '',
	titulolivro: '',
	defaults: {
		'idisbn': null,
		'autornome': '',
		'assunto': '',
		'qtdexemplaresdisponiveis': '',
		'qtdpaginas': '',
		'anopublicacao': '',
		'edicao': '',
		'descricaolivro': '',
		'qtdexemplares': '',
		'editoranome': '',
		'titulolivro': ''
	}
});

/**
 * CategoriaLivro Backbone Collection
 */
model.CategoriaLivroCollection = model.AbstractCollection.extend({
	url: 'api/categorialivros',
	model: model.CategoriaLivroModel
});

/**
 * Livro Backbone Model
 */
model.LivroModel = Backbone.Model.extend({
	urlRoot: 'api/livro',
	idAttribute: 'idlivro',
	idlivro: '',
	anoaquisicao: '',
	retiravel: '',
	situacao: '',
	idisbn: '',
	idlocalizacao: '',
	defaults: {
		'idlivro': null,
		'anoaquisicao': '',
		'retiravel': '',
		'situacao': '',
		'idisbn': '',
		'idlocalizacao': ''
	}
});

/**
 * Livro Backbone Collection
 */
model.LivroCollection = model.AbstractCollection.extend({
	url: 'api/livros',
	model: model.LivroModel
});

/**
 * Localizacao Backbone Model
 */
model.LocalizacaoModel = Backbone.Model.extend({
	urlRoot: 'api/localizacao',
	idAttribute: 'idlocalizacao',
	idlocalizacao: '',
	prateleiraposicao: '',
	prateleiranumero: '',
	defaults: {
		'idlocalizacao': null,
		'prateleiraposicao': '',
		'prateleiranumero': ''
	}
});

/**
 * Localizacao Backbone Collection
 */
model.LocalizacaoCollection = model.AbstractCollection.extend({
	url: 'api/localizacoes',
	model: model.LocalizacaoModel
});

/**
 * Movimentacao Backbone Model
 */
model.MovimentacaoModel = Backbone.Model.extend({
	urlRoot: 'api/movimentacao',
	idAttribute: 'idmovimentacao',
	idmovimentacao: '',
	idcpf: '',
	dataentrega: '',
	perdadano: '',
	dataultimarenovacao: '',
	datadevolucao: '',
	idlivro: '',
	defaults: {
		'idmovimentacao': null,
		'idcpf': '',
		'dataentrega': new Date(),
		'perdadano': '',
		'dataultimarenovacao': new Date(),
		'datadevolucao': new Date(),
		'idlivro': ''
	}
});

/**
 * Movimentacao Backbone Collection
 */
model.MovimentacaoCollection = model.AbstractCollection.extend({
	url: 'api/movimentacoes',
	model: model.MovimentacaoModel
});

/**
 * Reserva Backbone Model
 */
model.ReservaModel = Backbone.Model.extend({
	urlRoot: 'api/reserva',
	idAttribute: 'dreserva',
	dreserva: '',
	dcpf: '',
	dlivro: '',
	defaults: {
		'dreserva': null,
		'dcpf': '',
		'dlivro': ''
	}
});

/**
 * Reserva Backbone Collection
 */
model.ReservaCollection = model.AbstractCollection.extend({
	url: 'api/reservas',
	model: model.ReservaModel
});

/**
 * Usuario Backbone Model
 */
model.UsuarioModel = Backbone.Model.extend({
	urlRoot: 'api/usuario',
	idAttribute: 'idcpf',
	idcpf: '',
	logradouro: '',
	bairro: '',
	estado: '',
	telefonefixo: '',
	celular: '',
	cep: '',
	tipousuario: '',
	senha: '',
	email: '',
	pais: '',
	cidade: '',
	numero: '',
	nomeusuario: '',
	defaults: {
		'idcpf': null,
		'logradouro': '',
		'bairro': '',
		'estado': '',
		'telefonefixo': '',
		'celular': '',
		'cep': '',
		'tipousuario': '',
		'senha': '',
		'email': '',
		'pais': '',
		'cidade': '',
		'numero': '',
		'nomeusuario': ''
	}
});

/**
 * Usuario Backbone Collection
 */
model.UsuarioCollection = model.AbstractCollection.extend({
	url: 'api/usuarios',
	model: model.UsuarioModel
});

