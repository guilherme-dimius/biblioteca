<?php
/** @package    Biblioteca::Reporter */

/** import supporting libraries */
require_once("verysimple/Phreeze/Reporter.php");

/**
 * This is an example Reporter based on the CategoriaLivro object.  The reporter object
 * allows you to run arbitrary queries that return data which may or may not fith within
 * the data access API.  This can include aggregate data or subsets of data.
 *
 * Note that Reporters are read-only and cannot be used for saving data.
 *
 * @package Biblioteca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CategoriaLivroReporter extends Reporter
{

	// the properties in this class must match the columns returned by GetCustomQuery().
	// 'CustomFieldExample' is an example that is not part of the `categoriaLivro` table
	public $CustomFieldExample;

	public $Idisbn;
	public $Autornome;
	public $Assunto;
	public $Qtdexemplaresdisponiveis;
	public $Qtdpaginas;
	public $Anopublicacao;
	public $Edicao;
	public $Descricaolivro;
	public $Qtdexemplares;
	public $Editoranome;
	public $Titulolivro;

	/*
	* GetCustomQuery returns a fully formed SQL statement.  The result columns
	* must match with the properties of this reporter object.
	*
	* @see Reporter::GetCustomQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomQuery($criteria)
	{
		$sql = "select
			'custom value here...' as CustomFieldExample
			,`categoriaLivro`.`idIsbn` as Idisbn
			,`categoriaLivro`.`autorNome` as Autornome
			,`categoriaLivro`.`assunto` as Assunto
			,`categoriaLivro`.`qtdExemplaresDisponiveis` as Qtdexemplaresdisponiveis
			,`categoriaLivro`.`qtdPaginas` as Qtdpaginas
			,`categoriaLivro`.`anoPublicacao` as Anopublicacao
			,`categoriaLivro`.`edicao` as Edicao
			,`categoriaLivro`.`descricaoLivro` as Descricaolivro
			,`categoriaLivro`.`qtdExemplares` as Qtdexemplares
			,`categoriaLivro`.`editoraNome` as Editoranome
			,`categoriaLivro`.`tituloLivro` as Titulolivro
		from `categoriaLivro`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();
		$sql .= $criteria->GetOrder();

		return $sql;
	}
	
	/*
	* GetCustomCountQuery returns a fully formed SQL statement that will count
	* the results.  This query must return the correct number of results that
	* GetCustomQuery would, given the same criteria
	*
	* @see Reporter::GetCustomCountQuery
	* @param Criteria $criteria
	* @return string SQL statement
	*/
	static function GetCustomCountQuery($criteria)
	{
		$sql = "select count(1) as counter from `categoriaLivro`";

		// the criteria can be used or you can write your own custom logic.
		// be sure to escape any user input with $criteria->Escape()
		$sql .= $criteria->GetWhere();

		return $sql;
	}
}

?>