<?php

namespace App\Models;

class AppResult {

  public $status;
  public $message;

  public function toJson()
  {
    return json_encode($this, JSON_UNESCAPED_UNICODE);
  }

}
