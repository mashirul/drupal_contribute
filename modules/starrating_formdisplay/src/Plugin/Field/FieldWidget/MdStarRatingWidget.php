<?php

namespace Drupal\starrating_formdisplay\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'starrating' widget.
 *
 * @FieldWidget(
 *   id = "md_starrating",
 *   module = "starrating_formdisplay",
 *   label = @Translation("Star rating clickable"),
 *   field_types = {
 *     "starrating"
 *   }
 * )
 */
class MdStarRatingWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'fill_blank' => 1,
      'icon_type' => 'star',
      'icon_color' => 1,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    global $base_url;

    $element = [];

    $element['icon_type'] = [
      '#type' => 'select',
      '#title' => t('Icon type'),
      '#options' => [
        'star' => t('Star'),
        'starline' => t('Star (outline)'),
        'check' => t('Check'),
        'heart' => t('Heart'),
        'dollar' => t('Dollar'),
        'smiley' => t('Smiley'),
        'food' => t('Food'),
        'coffee' => t('Coffee'),
        'movie' => t('Movie'),
        'music' => t('Music'),
        'human' => t('Human'),
        'thumbsup' => t('Thumbs Up'),
        'car' => t('Car'),
        'airplane' => t('Airplane'),
        'fire' => t('Fire'),
        'drupalicon' => t('Drupalicon'),
        'custom' => t('Custom'),
      ],
      '#default_value' => $this->getSetting('icon_type'),
      '#prefix' => '<img src="' . $base_url . '/' . drupal_get_path('module', 'starrating') . '/css/sample.png" />',
    ];
    $element['icon_color'] = [
      '#type' => 'select',
      '#title' => t('Icon color'),
      '#options' => [
        1 => '1',
        2 => '2',
        3 => '3',
        4 => '4',
        5 => '5',
        6 => '6',
        7 => '7',
        8 => '8',
      ],
      '#default_value' => $this->getSetting('icon_color'),
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    $field_settings = $this->getFieldSettings();
    $max = $field_settings['max_value'];
    $min = 0;
    $icon_type = $this->getSetting('icon_type');
    $icon_color = $this->getSetting('icon_color');
    $fill_blank = $this->getSetting('fill_blank');
    $elements = [
      '#theme' => 'starrating_formatter',
      '#min' => $min,
      '#max' => $max,
      '#icon_type' => $icon_type,
      '#icon_color' => $icon_color,
      '#fill_blank' => $fill_blank,
    ];
    $elements['#attached']['library'][] = 'starrating/' . $icon_type;
    $summary[] = $elements;

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $value = isset($items[$delta]->value) ? $items[$delta]->value : 0;
    $field_settings = $this->getFieldSettings();
    $max = $field_settings['max_value'];
    $min = 0;
    $icon_type = $this->getSetting('icon_type');
    $icon_color = $this->getSetting('icon_color');
    $fill_blank = $this->getSetting('fill_blank');
    $render = \Drupal::service('renderer');
    $rateStruct = [
      '#theme' => 'starrating_formatter',
      '#rate' => $value,
      '#min' => $min,
      '#max' => $max,
      '#icon_type' => $icon_type,
      '#icon_color' => $icon_color,
      '#fill_blank' => $fill_blank,
    ];
    $element += [
      '#delta' => $delta,
      '#type' => 'hidden',
      '#default_value' => $value,
      '#attributes' => ['class' => ['md-rate-item']],
      '#suffix' => "<div class='clear overflow-hidden'><div class='md-title-rate' data-color='{$icon_color}' data-icon-type='{$icon_type}'>{$element['#title']}</div>" . $render->render($rateStruct) . '</div>',
    ];
    $element['#attached']['library'][] = 'starrating/' . $icon_type;
    $element['#attached']['library'][] = 'starrating_formdisplay/md_rating';
    return ['value' => $element];
  }

}
