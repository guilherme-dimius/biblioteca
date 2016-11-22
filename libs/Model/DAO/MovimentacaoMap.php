<?php
/** @package    Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * MovimentacaoMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the MovimentacaoDAO to the movimentacao datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Biblioteca::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class MovimentacaoMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["Idmovimentacao"] = new FieldMap("Idmovimentacao","movimentacao","idMovimentacao",true,FM_TYPE_INT,11,null,true);
			self::$FM["Idcpf"] = new FieldMap("Idcpf","movimentacao","idCpf",false,FM_TYPE_VARCHAR,12,null,false);
			self::$FM["Dataentrega"] = new FieldMap("Dataentrega","movimentacao","dataEntrega",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Perdadano"] = new FieldMap("Perdadano","movimentacao","perdaDano",false,FM_TYPE_TINYINT,1,null,false);
			self::$FM["Dataultimarenovacao"] = new FieldMap("Dataultimarenovacao","movimentacao","dataUltimaRenovacao",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Datadevolucao"] = new FieldMap("Datadevolucao","movimentacao","dataDevolucao",false,FM_TYPE_DATE,null,null,false);
			self::$FM["Idlivro"] = new FieldMap("Idlivro","movimentacao","idLivro",false,FM_TYPE_INT,11,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
			self::$KM["fkBloqueioMovimentacao"] = new KeyMap("fkBloqueioMovimentacao", "Idmovimentacao", "Bloqueio", "Idmovimentacao", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fkDevolucaoLivro"] = new KeyMap("fkDevolucaoLivro", "Idlivro", "Livro", "Idlivro", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fkDevolucaoUsuario"] = new KeyMap("fkDevolucaoUsuario", "Idcpf", "Usuario", "Idcpf", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>