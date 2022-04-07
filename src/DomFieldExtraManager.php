<?php

namespace Drupal\dom_field_extra;

use Drupal\Core\Database\Connection;

/**
 * Manager for field extra related methods.
 */
class DomFieldExtraManager implements DomFieldExtraManagerInterface {

  /**
   * Returns the database service.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * Constructs a DomFieldExtraManager object.
   *
   * @param \Drupal\Core\Database\Connection $database
   *   Base Database API class.
   */
  public function __construct(Connection $database) {
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   */
  public function isPrivate(int $id, string $type) {
    $query = $this->database->select('dom_field_extra_value', 'pf');
    $query->fields('pf');
    $query->condition('pf.id', $id);
    $query->condition('pf.key', $type);

    return (bool) $query->execute()->fetchField(3);
  }

  /**
   * {@inheritdoc}
   */
  public function add(array $conditions) {
    $query = $this->database->merge('dom_field_extra_value');
    $query->keys($conditions);
    $query->fields(['private' => 1]);
    $query->execute();
  }

  /**
   * {@inheritdoc}
   */
  public function delete(array $conditions) {
    $query = $this->database->delete('dom_field_extra_value');
    foreach ($conditions as $key => $value) {
      $query->condition($key, $value);
    }
    $query->execute();
  }

}
