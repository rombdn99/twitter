<?php
 require_once("class.pdofactory.php");
 require_once("abstract.databoundobject.php");
 require_once("class.Twitter.php");

class postgresLogger {

  public $url;
  public $message;
  public $objeto;

  public function __construct($url) {
    $this->url = $url;
    $this->connection();
  }

  public function connection(){
    $strDSN = "pgsql:dbname=sample_db;host=localhost;port=5432;";
    $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
        array());
    $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->objeto = new Twitter($objPDO);
  }

  public function writteMessage($message){
    $this->message = $message;
    $this->objeto->setId_Str($this->message["id_str"])->setText($this->message["text"])->setCreated_At($this->message["created_at"]);
    $this->objeto->save();
    print "<br/>Id_Str is: " . $this->objeto->getId_Str(). "<br/>";
    print "Text is: " . $this->objeto->getText(). "<br/>";
    print "Created_At is: " . $this->objeto->getCreated_At();
  }

}
?>
