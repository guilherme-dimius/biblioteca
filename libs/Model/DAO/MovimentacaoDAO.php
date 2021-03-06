<?php
/** @package Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("MovimentacaoMap.php");

/**
 * MovimentacaoDAO provides object-oriented access to the movimentacao table.  This
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
class MovimentacaoDAO extends Phreezable
{
	/** @var int */
	public $Idmovimentacao;

	/** @var string */
	public $Idcpf;

	/** @var date */
	public $Dataentrega;

	/** @var int */
	public $Perdadano;

	/** @var date */
	public $Dataultimarenovacao;

	/** @var date */
	public $Datadevolucao;

	/** @var int */
	public $Idlivro;


	/**
	 * Returns a dataset of Bloqueio objects with matching Idmovimentacao
	 * @param Criteria
	 * @return DataSet
	 */
	public function GetIdmovimentacaoBloqueios($criteria = null)
	{
		return $this->_phreezer->GetOneToMany($this, "fkBloqueioMovimentacao", $criteria);
	}

	/**
	 * Returns the foreign object based on the value of Idlivro
	 * @return Livro
	 */
	public function GetIdlivroLivro()
	{
		return $this->_phreezer->GetManyToOne($this, "fkDevolucaoLivro");
	}

	/**
	 * Returns the foreign object based on the value of Idcpf
	 * @return Usuario
	 */
	public function GetIdcpfUsuario()
	{
		return $this->_phreezer->GetManyToOne($this, "fkDevolucaoUsuario");
	}


}
?>