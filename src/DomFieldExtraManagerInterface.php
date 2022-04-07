<?php

namespace Drupal\dom_field_extra;

/**
 * Interface for field extra service.
 */
interface DomFieldExtraManagerInterface {

  /**
   * Returns whether user has private enabled.
   *
   * @param int $id
   *   The entity id.
   * @param string $type
   *   The key of the value.
   *
   * @return bool
   *   True if private enabled for the user's field.
   */
  public function isPrivate(int $id, string $type);

  /**
   * Add data to the private table.
   *
   * @param array $conditions
   *   An array of conditions; e.g. entity id, key value.
   */
  public function add(array $conditions);

  /**
   * Delete data from the private table.
   *
   * @param array $conditions
   *   An array of conditions; e.g. entity id, key value.
   */
  public function delete(array $conditions);

}
