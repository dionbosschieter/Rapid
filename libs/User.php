<?php

/**
 * User
 *
 * @author dionbosschieter
 */
class User {

  private $_logged = true;
  private $_level;

  const LEVEL_USER = 1;
  const LEVEL_ADMIN = 2;

  public function load() {

  }

  public function getLoggedIn() {
    return $this->_logged;
  }
}
