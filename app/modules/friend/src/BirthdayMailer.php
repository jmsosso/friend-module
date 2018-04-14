<?php

class BirthdayMailer {
  private $sentCount = 0;

  public function checkDates() {
    $query = new EntityFieldQuery();

    $query->entityCondition('entity_type', 'node')
      ->entityCondition('bundle', 'friend')
      ->fieldCondition('friend_birthday', 'value', '%-' . date('m-d') . '%', 'LIKE')
      ->propertyCondition('status', NODE_PUBLISHED);

    $result = $query->execute();

    if (isset($result['node'])) {
      $friendsNids = array_keys($result['node']);
      $friends = entity_load('node', $friendsNids);

      foreach ($friends as $friend) {
        $this->sendEmail($friend);
      }

      watchdog('friend', '@sent email messages sent.', ['@sent' => $this->sentCount],
        WATCHDOG_INFO);
    }
  }

  public function sendEmail($friend) {
    $email = $friend->friend_email[LANGUAGE_NONE][0]['value'];

    $result = drupal_mail('friend', 'birthday', $email, LANGUAGE_NONE, [
      '@first_name' => $friend->friend_first_name[LANGUAGE_NONE][0]['value'],
      '@last_name' => $friend->title,
    ]);

    if ($result['send']) {
      $this->sentCount++;
    }
  }

  public static function getEmailSubject() {
    return t('Happy birthday');
  }

  public static function getEmailBody($variables) {
    return [t("Dear @first_name @last_name,\n\nWe want to wish you a happy birthday!",
      $variables)];
  }

}
