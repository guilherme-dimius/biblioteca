<?php
/** @package    Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Criteria.php");

/**
 * CategoriaLivroCriteria allows custom querying for the CategoriaLivro object.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the ModelCriteria class which is extended from this class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @inheritdocs
 * @package Biblioteca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CategoriaLivroCriteriaDAO extends Criteria
{

	public $Idisbn_Equals;
	public $Idisbn_NotEquals;
	public $Idisbn_IsLike;
	public $Idisbn_IsNotLike;
	public $Idisbn_BeginsWith;
	public $Idisbn_EndsWith;
	public $Idisbn_GreaterThan;
	public $Idisbn_GreaterThanOrEqual;
	public $Idisbn_LessThan;
	public $Idisbn_LessThanOrEqual;
	public $Idisbn_In;
	public $Idisbn_IsNotEmpty;
	public $Idisbn_IsEmpty;
	public $Idisbn_BitwiseOr;
	public $Idisbn_BitwiseAnd;
	public $Autornome_Equals;
	public $Autornome_NotEquals;
	public $Autornome_IsLike;
	public $Autornome_IsNotLike;
	public $Autornome_BeginsWith;
	public $Autornome_EndsWith;
	public $Autornome_GreaterThan;
	public $Autornome_GreaterThanOrEqual;
	public $Autornome_LessThan;
	public $Autornome_LessThanOrEqual;
	public $Autornome_In;
	public $Autornome_IsNotEmpty;
	public $Autornome_IsEmpty;
	public $Autornome_BitwiseOr;
	public $Autornome_BitwiseAnd;
	public $Assunto_Equals;
	public $Assunto_NotEquals;
	public $Assunto_IsLike;
	public $Assunto_IsNotLike;
	public $Assunto_BeginsWith;
	public $Assunto_EndsWith;
	public $Assunto_GreaterThan;
	public $Assunto_GreaterThanOrEqual;
	public $Assunto_LessThan;
	public $Assunto_LessThanOrEqual;
	public $Assunto_In;
	public $Assunto_IsNotEmpty;
	public $Assunto_IsEmpty;
	public $Assunto_BitwiseOr;
	public $Assunto_BitwiseAnd;
	public $Qtdexemplaresdisponiveis_Equals;
	public $Qtdexemplaresdisponiveis_NotEquals;
	public $Qtdexemplaresdisponiveis_IsLike;
	public $Qtdexemplaresdisponiveis_IsNotLike;
	public $Qtdexemplaresdisponiveis_BeginsWith;
	public $Qtdexemplaresdisponiveis_EndsWith;
	public $Qtdexemplaresdisponiveis_GreaterThan;
	public $Qtdexemplaresdisponiveis_GreaterThanOrEqual;
	public $Qtdexemplaresdisponiveis_LessThan;
	public $Qtdexemplaresdisponiveis_LessThanOrEqual;
	public $Qtdexemplaresdisponiveis_In;
	public $Qtdexemplaresdisponiveis_IsNotEmpty;
	public $Qtdexemplaresdisponiveis_IsEmpty;
	public $Qtdexemplaresdisponiveis_BitwiseOr;
	public $Qtdexemplaresdisponiveis_BitwiseAnd;
	public $Qtdpaginas_Equals;
	public $Qtdpaginas_NotEquals;
	public $Qtdpaginas_IsLike;
	public $Qtdpaginas_IsNotLike;
	public $Qtdpaginas_BeginsWith;
	public $Qtdpaginas_EndsWith;
	public $Qtdpaginas_GreaterThan;
	public $Qtdpaginas_GreaterThanOrEqual;
	public $Qtdpaginas_LessThan;
	public $Qtdpaginas_LessThanOrEqual;
	public $Qtdpaginas_In;
	public $Qtdpaginas_IsNotEmpty;
	public $Qtdpaginas_IsEmpty;
	public $Qtdpaginas_BitwiseOr;
	public $Qtdpaginas_BitwiseAnd;
	public $Anopublicacao_Equals;
	public $Anopublicacao_NotEquals;
	public $Anopublicacao_IsLike;
	public $Anopublicacao_IsNotLike;
	public $Anopublicacao_BeginsWith;
	public $Anopublicacao_EndsWith;
	public $Anopublicacao_GreaterThan;
	public $Anopublicacao_GreaterThanOrEqual;
	public $Anopublicacao_LessThan;
	public $Anopublicacao_LessThanOrEqual;
	public $Anopublicacao_In;
	public $Anopublicacao_IsNotEmpty;
	public $Anopublicacao_IsEmpty;
	public $Anopublicacao_BitwiseOr;
	public $Anopublicacao_BitwiseAnd;
	public $Edicao_Equals;
	public $Edicao_NotEquals;
	public $Edicao_IsLike;
	public $Edicao_IsNotLike;
	public $Edicao_BeginsWith;
	public $Edicao_EndsWith;
	public $Edicao_GreaterThan;
	public $Edicao_GreaterThanOrEqual;
	public $Edicao_LessThan;
	public $Edicao_LessThanOrEqual;
	public $Edicao_In;
	public $Edicao_IsNotEmpty;
	public $Edicao_IsEmpty;
	public $Edicao_BitwiseOr;
	public $Edicao_BitwiseAnd;
	public $Descricaolivro_Equals;
	public $Descricaolivro_NotEquals;
	public $Descricaolivro_IsLike;
	public $Descricaolivro_IsNotLike;
	public $Descricaolivro_BeginsWith;
	public $Descricaolivro_EndsWith;
	public $Descricaolivro_GreaterThan;
	public $Descricaolivro_GreaterThanOrEqual;
	public $Descricaolivro_LessThan;
	public $Descricaolivro_LessThanOrEqual;
	public $Descricaolivro_In;
	public $Descricaolivro_IsNotEmpty;
	public $Descricaolivro_IsEmpty;
	public $Descricaolivro_BitwiseOr;
	public $Descricaolivro_BitwiseAnd;
	public $Qtdexemplares_Equals;
	public $Qtdexemplares_NotEquals;
	public $Qtdexemplares_IsLike;
	public $Qtdexemplares_IsNotLike;
	public $Qtdexemplares_BeginsWith;
	public $Qtdexemplares_EndsWith;
	public $Qtdexemplares_GreaterThan;
	public $Qtdexemplares_GreaterThanOrEqual;
	public $Qtdexemplares_LessThan;
	public $Qtdexemplares_LessThanOrEqual;
	public $Qtdexemplares_In;
	public $Qtdexemplares_IsNotEmpty;
	public $Qtdexemplares_IsEmpty;
	public $Qtdexemplares_BitwiseOr;
	public $Qtdexemplares_BitwiseAnd;
	public $Editoranome_Equals;
	public $Editoranome_NotEquals;
	public $Editoranome_IsLike;
	public $Editoranome_IsNotLike;
	public $Editoranome_BeginsWith;
	public $Editoranome_EndsWith;
	public $Editoranome_GreaterThan;
	public $Editoranome_GreaterThanOrEqual;
	public $Editoranome_LessThan;
	public $Editoranome_LessThanOrEqual;
	public $Editoranome_In;
	public $Editoranome_IsNotEmpty;
	public $Editoranome_IsEmpty;
	public $Editoranome_BitwiseOr;
	public $Editoranome_BitwiseAnd;
	public $Titulolivro_Equals;
	public $Titulolivro_NotEquals;
	public $Titulolivro_IsLike;
	public $Titulolivro_IsNotLike;
	public $Titulolivro_BeginsWith;
	public $Titulolivro_EndsWith;
	public $Titulolivro_GreaterThan;
	public $Titulolivro_GreaterThanOrEqual;
	public $Titulolivro_LessThan;
	public $Titulolivro_LessThanOrEqual;
	public $Titulolivro_In;
	public $Titulolivro_IsNotEmpty;
	public $Titulolivro_IsEmpty;
	public $Titulolivro_BitwiseOr;
	public $Titulolivro_BitwiseAnd;

}

?>