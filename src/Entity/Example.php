<?php

namespace Drupal\example\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the example entity.
 *
 * @ingroup exaple
 *
 * @ContentEntityType(
 *   id = "example",
 *   label = @Translation("Example"),
 *   admin_permission = "administer examples",
 *   base_table = "example",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *     "bundle" = "example_type",
 *     "label" = "name",
 *   },
 *   handlers = {
 *     "list_builder" = "Drupal\Core\Entity\EntityListBuilder",
 *     "form" = {
 *       "default" = "Drupal\Core\Entity\ContentEntityForm",
 *       "add" = "Drupal\Core\Entity\ContentEntityForm",
 *       "edit" = "Drupal\Core\Entity\ContentEntityForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider"
 *     },
 *   },
 *   links = {
 *     "canonical" = "/example/{example}",
 *     "add-page" = "/example/add",
 *     "add-form" = "/example/add/{example_type}",
 *     "edit-form" = "/example/{example}/edit",
 *     "delete-form" = "/example/{example}/delete",
 *     "collection" = "/example",
 *   },
 * )
 */
class Example extends ContentEntityBase implements ContentEntityInterface {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Example.'))
      ->setSetting('max_length', 255)
      ->setDisplayOptions('view', ['label' => 'above', 'type' => 'string'])
      ->setDisplayOptions('form', ['type' => 'string_textfield'])
      ->setRequired(TRUE);

    return $fields;
  }

}
