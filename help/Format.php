<?php
    class Format{
        public function dateFormat($date){
            return date('F j,Y g:i a', strtotime($date) );
        }
        public function shortText($body, $limit = 300){
            $body = $body. '';
            $body = substr($body, 0, $limit);
            $body = $body. '.....';
            return $body;
        }
        public function validation($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

?>