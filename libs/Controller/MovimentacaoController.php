<?php
/** @package    SGB::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Movimentacao.php");

/**
 * MovimentacaoController is the controller class for the Movimentacao object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package SGB::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class MovimentacaoController extends AppBaseController
{

	/**
	 * Override here for any controller-specific functionality
	 *
	 * @inheritdocs
	 */
	protected function Init()
	{
		parent::Init();

		// TODO: add controller-wide bootstrap code
		
		// TODO: if authentiation is required for this entire controller, for example:
		// $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
	}

	/**
	 * Displays a list view of Movimentacao objects
	 */
	public function ListView()
	{
		$this->Render();
	}

	/**
	 * API Method queries for Movimentacao records and render as JSON
	 */
	public function Query()
	{
		try
		{
			$criteria = new MovimentacaoCriteria();
			
			// TODO: this will limit results based on all properties included in the filter list 
			$filter = RequestUtil::Get('filter');
			if ($filter) $criteria->AddFilter(
				new CriteriaFilter('Idmovimentacao,Idcpf,Dataentrega,Perdadano,Dataultimarenovacao,Datadevolucao,Idlivro'
				, '%'.$filter.'%')
			);

			// TODO: this is generic query filtering based only on criteria properties
			foreach (array_keys($_REQUEST) as $prop)
			{
				$prop_normal = ucfirst($prop);
				$prop_equals = $prop_normal.'_Equals';

				if (property_exists($criteria, $prop_normal))
				{
					$criteria->$prop_normal = RequestUtil::Get($prop);
				}
				elseif (property_exists($criteria, $prop_equals))
				{
					// this is a convenience so that the _Equals suffix is not needed
					$criteria->$prop_equals = RequestUtil::Get($prop);
				}
			}

			$output = new stdClass();

			// if a sort order was specified then specify in the criteria
 			$output->orderBy = RequestUtil::Get('orderBy');
 			$output->orderDesc = RequestUtil::Get('orderDesc') != '';
 			if ($output->orderBy) $criteria->SetOrder($output->orderBy, $output->orderDesc);

			$page = RequestUtil::Get('page');

			if ($page != '')
			{
				// if page is specified, use this instead (at the expense of one extra count query)
				$pagesize = $this->GetDefaultPageSize();

				$movimentacoes = $this->Phreezer->Query('Movimentacao',$criteria)->GetDataPage($page, $pagesize);
				$output->rows = $movimentacoes->ToObjectArray(true,$this->SimpleObjectParams());
				$output->totalResults = $movimentacoes->TotalResults;
				$output->totalPages = $movimentacoes->TotalPages;
				$output->pageSize = $movimentacoes->PageSize;
				$output->currentPage = $movimentacoes->CurrentPage;
			}
			else
			{
				// return all results
				$movimentacoes = $this->Phreezer->Query('Movimentacao',$criteria);
				$output->rows = $movimentacoes->ToObjectArray(true, $this->SimpleObjectParams());
				$output->totalResults = count($output->rows);
				$output->totalPages = 1;
				$output->pageSize = $output->totalResults;
				$output->currentPage = 1;
			}


			$this->RenderJSON($output, $this->JSONPCallback());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method retrieves a single Movimentacao record and render as JSON
	 */
	public function Read()
	{
		try
		{
			$pk = $this->GetRouter()->GetUrlParam('idmovimentacao');
			$movimentacao = $this->Phreezer->Get('Movimentacao',$pk);
			$this->RenderJSON($movimentacao, $this->JSONPCallback(), true, $this->SimpleObjectParams());
		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method inserts a new Movimentacao record and render response as JSON
	 */
	public function Create()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$movimentacao = new Movimentacao($this->Phreezer);

			// TODO: any fields that should not be inserted by the user should be commented out

			// this is an auto-increment.  uncomment if updating is allowed
			// $movimentacao->Idmovimentacao = $this->SafeGetVal($json, 'idmovimentacao');

			$movimentacao->Idcpf = $this->SafeGetVal($json, 'idcpf');
			$movimentacao->Dataentrega = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataentrega')));
			$movimentacao->Perdadano = $this->SafeGetVal($json, 'perdadano');
			$movimentacao->Dataultimarenovacao = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataultimarenovacao')));
			$movimentacao->Datadevolucao = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datadevolucao')));
			$movimentacao->Idlivro = $this->SafeGetVal($json, 'idlivro');

			$movimentacao->Validate();
			$errors = $movimentacao->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$movimentacao->Save();
				$this->RenderJSON($movimentacao, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method updates an existing Movimentacao record and render response as JSON
	 */
	public function Update()
	{
		try
		{
						
			$json = json_decode(RequestUtil::GetBody());

			if (!$json)
			{
				throw new Exception('The request body does not contain valid JSON');
			}

			$pk = $this->GetRouter()->GetUrlParam('idmovimentacao');
			$movimentacao = $this->Phreezer->Get('Movimentacao',$pk);

			// TODO: any fields that should not be updated by the user should be commented out

			// this is a primary key.  uncomment if updating is allowed
			// $movimentacao->Idmovimentacao = $this->SafeGetVal($json, 'idmovimentacao', $movimentacao->Idmovimentacao);

			$movimentacao->Idcpf = $this->SafeGetVal($json, 'idcpf', $movimentacao->Idcpf);
			$movimentacao->Dataentrega = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataentrega', $movimentacao->Dataentrega)));
			$movimentacao->Perdadano = $this->SafeGetVal($json, 'perdadano', $movimentacao->Perdadano);
			$movimentacao->Dataultimarenovacao = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'dataultimarenovacao', $movimentacao->Dataultimarenovacao)));
			$movimentacao->Datadevolucao = date('Y-m-d H:i:s',strtotime($this->SafeGetVal($json, 'datadevolucao', $movimentacao->Datadevolucao)));
			$movimentacao->Idlivro = $this->SafeGetVal($json, 'idlivro', $movimentacao->Idlivro);

			$movimentacao->Validate();
			$errors = $movimentacao->GetValidationErrors();

			if (count($errors) > 0)
			{
				$this->RenderErrorJSON('Please check the form for errors',$errors);
			}
			else
			{
				$movimentacao->Save();
				$this->RenderJSON($movimentacao, $this->JSONPCallback(), true, $this->SimpleObjectParams());
			}


		}
		catch (Exception $ex)
		{


			$this->RenderExceptionJSON($ex);
		}
	}

	/**
	 * API Method deletes an existing Movimentacao record and render response as JSON
	 */
	public function Delete()
	{
		try
		{
						
			// TODO: if a soft delete is prefered, change this to update the deleted flag instead of hard-deleting

			$pk = $this->GetRouter()->GetUrlParam('idmovimentacao');
			$movimentacao = $this->Phreezer->Get('Movimentacao',$pk);

			$movimentacao->Delete();

			$output = new stdClass();

			$this->RenderJSON($output, $this->JSONPCallback());

		}
		catch (Exception $ex)
		{
			$this->RenderExceptionJSON($ex);
		}
	}
}

?>
