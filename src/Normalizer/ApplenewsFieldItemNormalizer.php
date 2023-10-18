<?php

namespace Drupal\applenews\Normalizer;

use Drupal\Core\Field\FieldItemInterface;

/**
 * Class ApplenewsFieldItemNormalizer.
 *
 * @package Drupal\applenews\Normalizer
 */
class ApplenewsFieldItemNormalizer extends ApplenewsNormalizerBase {

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($data, $format = NULL): bool {
    return $format === $this->format && $data instanceof FieldItemInterface;
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($field, $format = NULL, array $context = []): array|bool|string|int|float|null|\ArrayObject {
    $value = '';

    foreach ($field as $field_item) {
      $value .= $this->serializer->normalize($field_item, $format, $context);
    }

    return $value;
  }

}
