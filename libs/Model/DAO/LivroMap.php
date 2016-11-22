<?php
/** @package    Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * LivroMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the LivroDAO to the livro datastore.
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
class LivroMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idlivro"] = new FieldMap("Idlivro","livro","idLivro",true,FM_TYPE_INT,11,null,true);
			self::$FM["Anoaquisicao"] = new FieldMap("Anoaquisicao","livro","anoAquisicao",false,FM_TYPE_YEAR,4,null,false);
			self::$FM["Retiravel"] = new FieldMap("Retiravel","livro","retiravel",false,FM_TYPE_TINYINT,1,null,false);
			self::$FM["Situacao"] = new FieldMap("Situacao","livro","situacao",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Idisbn"] = new FieldMap("Idisbn","livro","idIsbn",false,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Idlocalizacao"] = new FieldMap("Idlocalizacao","livro","idLocalizacao",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fkBloqueioLivro"] = new KeyMap("fkBloqueioLivro", "Idlivro", "Bloqueio", "Idlivro", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fkDevolucaoLivro"] = new KeyMap("fkDevolucaoLivro", "Idlivro", "Movimentacao", "Idlivro", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fkReservaLivro"] = new KeyMap("fkReservaLivro", "Idlivro", "Reserva", "Dlivro", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fkLivroCategoria"] = new KeyMap("fkLivroCategoria", "Idisbn", "Categorialivro", "Idisbn", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fkLivroLocalizacao"] = new KeyMap("fkLivroLocalizacao", "Idlocalizacao", "Localizacao", "Idlocalizacao", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>