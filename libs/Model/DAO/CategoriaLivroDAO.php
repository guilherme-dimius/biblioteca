<?php
/** @package Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("CategoriaLivroMap.php");

/**
 * CategoriaLivroDAO provides object-oriented access to the categoriaLivro table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Biblioteca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class CategoriaLivroDAO extends Phreezable
{
	/** @var string */
	public $Idisbn;

	/** @var string */
	public $Autornome;

	/** @var string */
	public $Assunto;

	/** @var int */
	public $Qtdexemplaresdisponiveis;

	/** @var int */
	public $Qtdpaginas;

	/** @var year */
	public $Anopublicacao;

	/** @var int */
	public $Edicao;

	/** @var string */
	public $Descricaolivro;

	/** @var int */
	public $Qtdexemplares;

	/** @var string */
	public $Editoranome;

	/** @var string */
	public $Titulolivro;


	/**
	 * Returns a dataset of Livro objects with matching Idisbn
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetIdisbnLivros($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fkLivroCategoria", $criteria);
	}


}
?>