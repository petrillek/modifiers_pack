<?php

namespace Drupal\modifiers_bg_image\Plugin\modifiers;

use Drupal\modifiers\Modification;
use Drupal\modifiers\ModifierPluginBase;

/**
 * Provides a Modifier to set the image background on an element.
 *
 * @Modifier(
 *   id = "image_bg_modifier",
 *   label = @Translation("Image Background Modifier"),
 *   description = @Translation("Provides a Modifier to set the image background on an element"),
 * )
 */
class ImageBgModifier extends ModifierPluginBase {

  /**
   * {@inheritdoc}
   */
  public static function modification($selector, array $config) {

    if (!empty($config['image'])) {
      $media = parent::getMediaQuery($config);

      $css[$media][$selector][] = 'background-image:url("' . $config['image'] . '")';
      $attributes['class'][] = 'modifiers-has-background';

      if (!empty($config['image_style'])) {

        switch ($config['image_style']) {

          case 'stretch':
            $css[$media][$selector][] = 'background-size:cover';
            break;

          case 'no-repeat':
          case 'repeat':
          case 'repeat-x':
          case 'repeat-y':
            $css[$media][$selector][] = 'background-repeat:' . $config['image_style'];
            break;
        }
      }

      return new Modification($css, [], [], $attributes);
    }
    return NULL;
  }

}