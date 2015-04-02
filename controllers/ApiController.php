<?php

class ApiController {

  public function indexAction() {
    $user = new User();
    $this->checkCode($_POST['ticketnr'], $_POST['webcode']);
  }

  private function checkCode($ticketnr, $webcode)
  {
    $mt = new MyTicket();
    $mt->setTicketnr($ticketnr);
    $mt->setWebcode($webcode);

    if($mt->check()) {
      echo "0x00 ". $mt->getAmount();

    } else {
      echo "0x01";
    }
  }

  private function saveTicket($ticketnr, $webcode, $amount)
  {
    $ticket = new Ticket();
    $ticket->ticketnumber = $ticketnr;
    $ticket->webcode = $webcode;
    $ticket->amount = $amount;
    $ticket->save();
  }

}
