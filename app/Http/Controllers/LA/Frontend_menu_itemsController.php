<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;

use App\Models\Frontend_menu_item;

class Frontend_menu_itemsController extends Controller
{
	public $show_action = true;
	public $view_col = 'menu_title';
	public $listing_cols = ['id', 'menu_title', 'menu_position', 'menu_parent_id', 'menu_link', 'menu_action'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Frontend_menu_items', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Frontend_menu_items', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Frontend_menu_items.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Frontend_menu_items');
		
		if(Module::hasAccess($module->id)) {
			return View('la.frontend_menu_items.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new frontend_menu_item.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created frontend_menu_item in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Frontend_menu_items", "create")) {
		
			$rules = Module::validateRules("Frontend_menu_items", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Frontend_menu_items", $request);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.frontend_menu_items.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified frontend_menu_item.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Frontend_menu_items", "view")) {
			
			$frontend_menu_item = Frontend_menu_item::find($id);
			if(isset($frontend_menu_item->id)) {
				$module = Module::get('Frontend_menu_items');
				$module->row = $frontend_menu_item;
				
				return view('la.frontend_menu_items.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('frontend_menu_item', $frontend_menu_item);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("frontend_menu_item"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified frontend_menu_item.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Frontend_menu_items", "edit")) {			
			$frontend_menu_item = Frontend_menu_item::find($id);
			if(isset($frontend_menu_item->id)) {	
				$module = Module::get('Frontend_menu_items');
				
				$module->row = $frontend_menu_item;
				
				return view('la.frontend_menu_items.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('frontend_menu_item', $frontend_menu_item);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("frontend_menu_item"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified frontend_menu_item in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Frontend_menu_items", "edit")) {
			
			$rules = Module::validateRules("Frontend_menu_items", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Frontend_menu_items", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.frontend_menu_items.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified frontend_menu_item from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Frontend_menu_items", "delete")) {
			Frontend_menu_item::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.frontend_menu_items.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('frontend_menu_items')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Frontend_menu_items');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/frontend_menu_items/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Frontend_menu_items", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/frontend_menu_items/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Frontend_menu_items", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.frontend_menu_items.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
