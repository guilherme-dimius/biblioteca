<?php
/** @package    Biblioteca::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * CategoriaLivroMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the CategoriaLivroDAO to the categoriaLivro datastore.
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
class CategoriaLivroMap implements IDaoMap, IDaoMap2
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
			self::$FM["Idisbn"] = new FieldMap("Idisbn","categoriaLivro","idIsbn",true,FM_TYPE_VARCHAR,13,null,false);
			self::$FM["Autornome"] = new FieldMap("Autornome","categoriaLivro","autorNome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Assunto"] = new FieldMap("Assunto","categoriaLivro","assunto",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Qtdexemplaresdisponiveis"] = new FieldMap("Qtdexemplaresdisponiveis","categoriaLivro","qtdExemplaresDisponiveis",false,FM_TYPE_INT,11,null,false);
			self::$FM["Qtdpaginas"] = new FieldMap("Qtdpaginas","categoriaLivro","qtdPaginas",false,FM_TYPE_INT,11,null,false);
			self::$FM["Anopublicacao"] = new FieldMap("Anopublicacao","categoriaLivro","anoPublicacao",false,FM_TYPE_YEAR,4,null,false);
			self::$FM["Edicao"] = new FieldMap("Edicao","categoriaLivro","edicao",false,FM_TYPE_INT,11,null,false);
			self::$FM["Descricaolivro"] = new FieldMap("Descricaolivro","categoriaLivro","descricaoLivro",false,FM_TYPE_VARCHAR,200,null,false);
			self::$FM["Qtdexemplares"] = new FieldMap("Qtdexemplares","categoriaLivro","qtdExemplares",false,FM_TYPE_INT,11,null,false);
			self::$FM["Editoranome"] = new FieldMap("Editoranome","categoriaLivro","editoraNome",false,FM_TYPE_VARCHAR,50,null,false);
			self::$FM["Titulolivro"] = new FieldMap("Titulolivro","categoriaLivro","tituloLivro",false,FM_TYPE_VARCHAR,50,null,false);
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
			self::$KM["fkLivroCategoria"] = new KeyMap("fkLivroCategoria", "Idisbn", "Livro", "Idisbn", KM_TYPE_ONETOMANY, KM_LOAD_LAZY);  // use KM_LOAD_EAGER with caution here (one-to-one relationships only)
		}
		return self::$KM;
	}

}

?>