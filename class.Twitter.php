<?php
 require_once("abstract.databoundobject.php");
class Twitter extends DataBoundObject {

        protected $ID;
        protected $Id_Str;
        protected $Text;
        protected $Created_At;

        protected function DefineTableName() {
                return("twitter");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "id_str" => "Id_Str",
                        "text" => "Text",
                        "created_at" => "Created_At"));
        }
}
?>
