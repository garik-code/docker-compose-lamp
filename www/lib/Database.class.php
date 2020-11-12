<?php

class Database {

  private $host;
  private $user;
  private $pass;
  private $base;
  private $db;

  function __construct($base='docker', $host='database', $user='root', $pass='GscaEbDT#gB@'){
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->base = $base;
  }

  function win1251toutf($string_a) {
    $str_b = strtoupper ($string_a);
    return strtr($str_b, array("U0430"=>"а", "U0431"=>"б", "U0432"=>"в",
    "U0433"=>"г", "U0434"=>"д", "U0435"=>"е", "U0451"=>"ё", "U0436"=>"ж", "U0437"=>"з", "U0438"=>"и",
    "U0439"=>"й", "U043A"=>"к", "U043B"=>"л", "U043C"=>"м", "U043D"=>"н", "U043E"=>"о", "U043F"=>"п",
    "U0440"=>"р", "U0441"=>"с", "U0442"=>"т", "U0443"=>"у", "U0444"=>"ф", "U0445"=>"х", "U0446"=>"ц",
    "U0447"=>"ч", "U0448"=>"ш", "U0449"=>"щ", "U044A"=>"ъ", "U044B"=>"ы", "U044C"=>"ь", "U044D"=>"э",
    "U044E"=>"ю", "U044F"=>"я", "U0410"=>"А", "U0411"=>"Б", "U0412"=>"В", "U0413"=>"Г", "U0414"=>"Д",
    "U0415"=>"Е", "U0401"=>"Ё", "U0416"=>"Ж", "U0417"=>"З", "U0418"=>"И", "U0419"=>"Й", "U041A"=>"К",
    "U041B"=>"Л", "U041C"=>"М", "U041D"=>"Н", "U041E"=>"О", "U041F"=>"П", "U0420"=>"Р", "U0421"=>"С",
    "U0422"=>"Т", "U0423"=>"У", "U0424"=>"Ф", "U0425"=>"Х", "U0426"=>"Ц", "U0427"=>"Ч", "U0428"=>"Ш",
    "U0429"=>"Щ", "U042A"=>"Ъ", "U042B"=>"Ы", "U042C"=>"Ь", "U042D"=>"Э", "U042E"=>"Ю", "U042F"=>"Я"));
  }

  private function test(){
    if (!$this->db) {
        print "Error: Unable to connect to MySQL." . PHP_EOL;
        print "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        print "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
  }

  private function connect(){
    $this->db = mysqli_connect($this->host, $this->user, $this->pass, $this->base);
    $this->test();
    mysqli_query($this->db, "SET NAMES 'utf8'");
  }

  private function close(){
    mysqli_close($this->db);
  }

  function sql($query){
    $this->connect();
    return $this->db->query($query);
    $this->close();
  }

  function fetchAll($query){
    $fetch = $this->sql($query);
    $array = array();
    while($object = mysqli_fetch_array($fetch, MYSQLI_ASSOC)){
      $array[] = $object;
    }
    return $array;
  }

}
