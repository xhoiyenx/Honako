<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 06/03/2016
 *
 * Domain: 
 * Manager
 * 
 * Type: 
 * Controller
 * 
 * Description:
 * Configuration page
 */
namespace Domain\Manager\Config;

use Settings;
use Illuminate\Http\Request;
use Domain\Manager\BaseController;

class Configuration extends BaseController
{
  public function index( Request $request, $type = 'general' )
  {
  	if ( $request->isMethod('post') ) {
  		$this->save();
  	}
  	
    return view()->make('setting.index');
  }

  private function save()
  {

  }
}
