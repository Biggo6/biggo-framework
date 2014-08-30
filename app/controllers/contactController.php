<?php 

class contactController extends EngineController {


	public function index(){
		//$this->view('framework');
		EngineView::make('framework');
	}

}