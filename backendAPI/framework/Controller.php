<?php
  /**
   * Controller class : base controller
   */
  class Controller{

    protected $modelInstance = null;
    protected $res = [
      'err' => false,
      'alert' => '',
      'message' => '',
      'code' => 200,
      'data' => []
    ];
    public function response()
  {
    http_response_code($this->res['code']);
    echo json_encode($this->res);
    exit;
}
    function __construct(){

    }
    
    /**
     * Instantiate model
     * 
     * @param string $model
     * @return void
     * 
     */

    public function setModelInstance($model){
      if(file_exists(APPLICATION_PATH.DS.'models'.DS.ucwords($model).'.php')){
        require_once APPLICATION_PATH.DS.'models'.DS.ucwords($model).'.php';
        $this->modelInstance = new $model();
      }else die("Err : model '$model' does not exist <br><a href='".URLROOT."'>Go back</a>");
    }

   

   


  

    
  }
