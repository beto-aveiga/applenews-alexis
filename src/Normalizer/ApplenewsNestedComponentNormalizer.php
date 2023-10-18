<?php

namespace Drupal\applenews\Normalizer;

/**
 * Normalizer for "nested" component types.
 */
class ApplenewsNestedComponentNormalizer extends ApplenewsComponentNormalizerBase {

  protected $componentType = 'nested';

  /**
   * {@inheritdoc}
   */
  public function normalize($data, $format = NULL, array $context = []): array|bool|string|int|float|null|\ArrayObject {
    $component_class = $this->getComponentClass($data['id']);

    $component = new $component_class();
    foreach ($data['component_data']['components'] as $child_component) {
      $component->addComponent($this->serializer->normalize($child_component, $format, $context));
    }

    $component->setLayout($this->getComponentLayout($data['component_layout']));

    return $component;
  }

}
