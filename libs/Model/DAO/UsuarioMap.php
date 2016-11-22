<?php
/** @package    Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * UsuarioMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the UsuarioDAO to the usuario datastore.
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
class UsuarioMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idcpf"] = new FieldMap("Idcpf","usuario","idCpf",true,FM_TYPE_VARCHAR,12,null,false);
			self::$FM["Logradouro"] = new FieldMap("Logradouro","usuario","logradouro",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Bairro"] = new FieldMap("Bairro","usuario","bairro",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Estado"] = new FieldMap("Estado","usuario","estado",false,FM_TYPE_VARCHAR,2,null,false);
			self::$FM["Telefonefixo"] = new FieldMap("Telefonefixo","usuario","telefoneFixo",false,FM_TYPE_VARCHAR,10,null,false);
			self::$FM["Celular"] = new FieldMap("Celular","usuario","celular",false,FM_TYPE_INT,11,null,false);
			self::$FM["Cep"] = new FieldMap("Cep","usuario","cep",false,FM_TYPE_VARCHAR,8,null,false);
			self::$FM["Tipousuario"] = new FieldMap("Tipousuario","usuario","tipoUsuario",false,FM_TYPE_VARCHAR,9,null,false);
			self::$FM["Senha"] = new FieldMap("Senha","usuario","senha",false,FM_TYPE_VARCHAR,30,null,false);
			self::$FM["Email"] = new FieldMap("Email","usuario","email",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Pais"] = new FieldMap("Pais","usuario","pais",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Cidade"] = new FieldMap("Cidade","usuario","cidade",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Numero"] = new FieldMap("Numero","usuario","numero",false,FM_TYPE_INT,11,null,false);
			self::$FM["Nomeusuario"] = new FieldMap("Nomeusuario","usuario","nomeUsuario",false,FM_TYPE_VARCHAR,100,null,false);
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
			self::$KM["fkDevolucaoUsuario"] = new KeyMap("fkDevolucaoUsuario", "Idcpf", "Movimentacao", "Idcpf", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
			self::$KM["fkReservaUsuario"] = new KeyMap("fkReservaUsuario", "Idcpf", "Reserva", "Dcpf", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>