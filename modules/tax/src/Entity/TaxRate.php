<?php

/**
 * @file
 * Contains \Drupal\commerce_tax\Entity\TaxRate.
 */

namespace Drupal\commerce_tax\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use CommerceGuys\Tax\Model\TaxRateInterface;
use CommerceGuys\Tax\Model\TaxTypeInterface;
use CommerceGuys\Tax\Model\TaxRateAmountInterface;

/**
 * Defines the Tax Rate configuration entity.
 *
 * @ConfigEntityType(
 *   id = "commerce_tax_rate",
 *   label = @Translation("Tax rate"),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\commerce_tax\Form\TaxRateForm",
 *       "edit" = "Drupal\commerce_tax\Form\TaxRateForm",
 *       "delete" = "Drupal\commerce_tax\Form\TaxRateDeleteForm",
 *     },
 *     "list_builder" = "Drupal\commerce_tax\TaxRateListBuilder"
 *   },
 *   admin_permission = "administer stores",
 *   config_prefix = "commerce_tax_rate",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "displayName" = "displayName",
 *     "default" = "default",
 *     "amounts" = "amounts",
 *     "type" = "type"
 *   },
 *   links = {
 *     "edit-form" = "/admin/commerce/config/tax/rate/{commerce_tax_rate}/edit",
 *     "delete-form" = "/admin/commerce/config/tax/rate/{commerce_tax_rate}/delete",
 *     "collection" = "/admin/commerce/config/tax/rate"
 *   }
 * )
 */
class TaxRate extends ConfigEntityBase implements TaxRateInterface {

  /**
   * The tax rate type.
   *
   * @var \CommerceGuys\Tax\Model\TaxTypeInterface
   */
  protected $type;

  /**
   * The tax rate id.
   *
   * @var string
   */
  protected $id;

  /**
   * The tax rate name.
   *
   * @var string
   */
  protected $name;

  /**
   * The tax rate display name.
   *
   * @var string
   */
  protected $displayName;

  /**
   * The tax rate defaultness.
   *
   * @var boolean
   */
  protected $default;

  /**
   * The tax rate amounts.
   *
   * @var array
   */
  protected $amounts = array();

  /**
   * {@inheritdoc}
   */
  public function getType() {
    return $this->type;
  }

  /**
   * {@inheritdoc}
   */
  public function setType(TaxTypeInterface $type = null) {
    $this->type = $type;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function setId($id) {
    $this->id = $id;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getDisplayName() {
    return $this->displayName;
  }

  /**
   * {@inheritdoc}
   */
  public function setDisplayName($displayName) {
    $this->displayName = $displayName;
  }

  /**
   * {@inheritdoc}
   */
  public function isDefault() {
    return $this->default;
  }

  /**
   * {@inheritdoc}
   */
  public function setDefault($default) {
    $this->default = $default;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getAmounts() {
    return $this->amounts;
  }

  /**
   * {@inheritdoc}
   */
  public function setAmounts($amounts) {
    $this->amounts = $amounts;
  }

  /**
   * {@inheritdoc}
   */
  public function getAmount(\DateTime $date) {
    return null;
  }

  /**
   * {@inheritdoc}
   */
  public function hasAmounts() {
    return count($this->amounts) > 0;
  }

  /**
   * {@inheritdoc}
   */
  public function addAmount(TaxRateAmountInterface $amount) {
    $this->amounts[] = $amount->getId();

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function removeAmount(TaxRateAmountInterface $amount) {
    unset($this->amounts[array_search($amount->getId(), $this->amounts)]);

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function hasAmount(TaxRateAmountInterface $amount) {
    return array_search($amount->getId(), $this->amounts) !== FALSE;
  }

}
