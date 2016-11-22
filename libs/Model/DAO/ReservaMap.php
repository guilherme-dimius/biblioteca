<?php
/** @package    Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * ReservaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the ReservaDAO to the reserva datastore.
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
class ReservaMap implements IDaoMap, IDaoMap2
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
			self::$FM["Dreserva"] = new FieldMap("Dreserva","reserva","idReserva",true,FM_TYPE_INT,11,null,true);
			self::$FM["Dcpf"] = new FieldMap("Dcpf","reserva","idCpf",false,FM_TYPE_VARCHAR,12,null,false);
			self::$FM["Dlivro"] = new FieldMap("Dlivro","reserva","idLivro",false,FM_TYPE_INT,11,null,false);
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
			self::$KM["fkReservaLivro"] = new KeyMap("fkReservaLivro", "Dlivro", "Livro", "Idlivro", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
			self::$KM["fkReservaUsuario"] = new KeyMap("fkReservaUsuario", "Dcpf", "Usuario", "Idcpf", KM_TYPE_MANYTOONE, KM_LOAD_LAZY); // you change to KM_LOAD_EAGER here or (preferrably) make the change in _config.php
		}
		return self::$KM;
	}

}

?>