<?php

namespace WellnessLiving\Wl\Profile\Purchase;

use WellnessLiving\WlModelAbstract;

/**
 * Gets the details of a specified purchase. This endpoint is still available but has been superseded by
 * Profile\PurchaseList\PurchaseListModel.
 *
 * This endpoint may require different IDs to be specified for different types of purchases.
 * The IDs required for a specific item will be the same IDs returned from the Profile\Purchase\PurchaseListModel
 * endpoint.
 */
class PurchaseElementModel extends WlModelAbstract
{
  /**
   * An array containing information about the image of the purchased item. Every element has the following keys:
   * <dl>
   *   <dt>int <var>i_height</var></dt>
   *   <dd>The height of the image.</dd>
   *   <dt>int <var>i_width</var></dt>
   *   <dd>The width of the image.</dd>
   *   <dt>bool <var>is_empty</var></dt>
   *   <dd>If `true` then the purchased item does not have image. If `false` then the item has an image.</dd>
   *   <dt>string <var>s_url</var></dt>
   *   <dd>The URL for the image.</dd>
   * </dl>
   * @get result
   * @var array
   */
  public $a_logo = [];

  /**
   * This field is used only for promotions, it contains restrictions that will
   * apply to bookings made with this promotion. Every element has the following keys:
   * <dl>
   *   <dt>int <var>i_limit</var></dt>
   *   <dd>The number of sessions that may be booked during this period.</dd>
   *   <dt>int <var>i_remain</var></dt>
   *   <dd>The number of sessions that remain available.</dd>
   *   <dt>string <var>s_date</var></dt>
   *   <dd>The name of the period type.</dd>
   * </dl>
   * @get result
   * @var array
   */
  public $a_restrict = [];

  /**
   * The list of taxes paid for the purchased item. Every element has the following fields:
   * <dl>
   *   <dt>string <var>f_tax_discount</var></dt>
   *   <dd>The amount of tax.</dd>
   *   <dt>string <var>s_tax</var></dt>
   *   <dd>The name of the tax.</dd>
   * </dl>
   * @get result
   * @var array
   */
  public $a_tax = [];

  /**
   * This is `true` only if the purchased item is a promotion and the user can control the renewal of the promotion.
   * Otherwise, this is `false`.
   *
   * @get result
   * @var bool
   */
  public $can_renew = false;

  /**
   * The start date of the promotion, this is used only if the purchased item is a promotion.
   *
   * @get result
   * @var string
   */
  public $dl_start = '';

  /**
   * The expiration date of the promotion; this is used only if the purchased item is a promotion.
   *
   * @get result
   * @var string
   */
  public $dt_end = '';

  /**
   * The end date of the promotion hold; this is used only for promotions on hold.
   * This value may be empty if the hold is internal.
   *
   * @get result
   * @var string
   */
  public $dt_hold_end = '';

  /**
   * The start date of the promotion hold; this is used only for promotions on hold.
   *
   * @get result
   * @var string
   */
  public $dt_hold_start = '';

  /**
   * The purchase date of the purchased item. This is given in GMT in MySQL format.
   *
   * @get result
   * @var string
   */
  public $dt_purchase = '';

  /**
   * The date for when the email regarding the gift card should be sent (or was sent) to the receiver;
   * this is used only for gift cards.
   *
   * @get result
   * @var string
   */
  public $dt_send = '';

  /**
   * The percentage value of the discount for the client type. This is empty if this discount was not applied.
   *
   * @get result
   * @var string
   */
  public $f_discount_login_type_percent = '';

  /**
   * The description of the purchased item.
   *
   * @get result
   * @var string
   */
  public $html_description = '';

  /**
   * The number of sessions remaining for a promotion ;this value is used only for promotions.
   * This value will be `0` if the purchased item is not a promotion, or if there are no remaining sessions.
   *
   * @get result
   * @var int
   */
  public $i_book = 0;

  /**
   * The number of purchased items bought at the time of purchase.
   * This field will be `0` for purchase items obtained via a redemption code or as a result of an old import.
   *
   * @get result
   * @var int
   */
  public $i_buy = 0;

  /**
   * The percentage value of the discount given by a reward prize. This field will be `0` if a discount was not applied.
   *
   * @get result
   * @var int
   */
  public $i_discount_count = 0;

  /**
   * The number of visits which can be made with this promotion; this value is used only for promotions.
   *
   * @get result
   * @var int
   */
  public $i_limit = 0;

  /**
   * The number of bookings left with this promotion; this value is used only for non-sequential promotions.
   *
   * @get result
   * @var int
   */
  public $i_left = 0;

  /**
   * The duration of the regular payments interval; this value is used only for “membership” type promotions.
   *
   * @get result
   * @var int
   */
  public $i_payment_period = 0;

  /**
   * The number of remaining bookings for the promotion; this is used only for promotions.
   *
   * @get result
   * @var int
   */
  public $i_remain = 0;

  /**
   * The number of minutes remaining for the promotion;
   * this is used only for promotions that work with a limited number of minutes.
   *
   * @get result
   * @var int
   */
  public $i_remain_duration = 0;

  /**
   * This is used only for promotions. This is the number of visits that were attended for the promotion.
   *
   * @get result
   * @var int
   */
  public $i_use = 0;

  /**
   * The type of discount given via a reward prize. One on the {@link WlCommissionTypeSid} constants.
   * This will be empty if this discount was not applied.
   *
   * @get result
   * @var int
   */
  public $id_discount_commission_type = 0;

  /**
   * The type of duration for the promotion; this is used only for “membership” type promotions.
   * This determines whether the promotion lasts indefinitely, has a fixed duration or ends on a specific date.
   * One of the {@link WlDurationTypeSid} constants.
   *
   * @get result
   * @var int
   */
  public $id_duration = 0;

  /**
   * The ID of the promotion program; this is used only for promotions. One of the {@link WlProgramTypeSid} constants.
   *
   * @get result
   * @var int
   */
  public $id_program_type = 0;

  /**
   * The ID of the purchase item type. One of the {@link WlPurchaseItemSid} constants.
   *
   * @get result
   * @var int
   */
  public $id_purchase_item = 0;

  /**
   * The ID of the sale category. One of the {@link WlSaleSid} constants.
   *
   * @get result
   * @var int
   */
  public $id_sale = 0;

  /**
   * If `true`, then the purchase item is active. If `false`, then the purchase item is not active.
   *
   * @get result
   * @var bool
   */
  public $is_active = false;

  /**
   * If `true`, then the purchased item is a component of another purchase item, as is the case of a package.
   * If `false`, then the purchased item is not a component of another purchase item.
   *
   * @get result
   * @var bool
   */
  public $is_component = false;

  /**
   * If `true`, then this promotion will be converted to a different promotion after it expires. It `false`, then the
   * promotion will not be converted to a different promotion after it expires. This can only be true for certain
   * promotions.
   *
   * @get result
   * @var bool
   */
  public $is_convert = false;

  /**
   * This is `true` only if the purchased item is a promotion that is expired. This is `false` in all other cases.
   *
   * @get result
   * @var bool
   */
  public $is_expire = false;

  /**
   * This is `true` only if the purchased item is a promotion and has been placed on hold.
   * This is `false` in all other cases.
   *
   * @get result
   * @var bool
   */
  public $is_hold = false;

  /**
   * If `true`, then the usage of this purchased item is disabled. If `false`, then the usage of this purchased item
   * is enabled.
   *
   * @get result
   * @var bool
   */
  public $is_limit = false;

  /**
   * If `true`, then the discount was applied for the member type. If `false`, then the discount was applied for the
   * pass holder type. If `null`, then the discount was applied for the prospect type (this will not be `null` only
   * if a discount based on a client type was applied).
   *
   * @get result
   * @var bool|null
   */
  public $is_login_type_member = null;

  /**
   * If `true`, then the gift card email notification will be sent to the receiver; this is `true` only if the
   * purchased item is a gift card. This is `false` in all other cases.
   *
   * @get result
   * @var bool
   */
  public $is_mail = false;

  /**
   * If `true`, then the gift card email notification has been sent; this can only be `true` if the purchased item is a
   * gift card. This is `false` in all other cases.
   *
   * @get result
   * @var bool
   */
  public $is_past = false;

  /**
   * This is `true` if the gift card has been redeemed; this can only be true if the purchased item is a gift card.
   * This is `false` in all other cases.
   *
   * @get result
   * @var bool
   */
  public $is_redeem = false;

  /**
   * This is `true` if the promotion is auto-renewable; this can only be true if the purchased item is a promotion.
   * This is `false` in all other cases.
   *
   * @get result
   * @var bool
   */
  public $is_renew = false;

  /**
   * This is `true` if the promotion has been transferred; this can only be `true` if the purchased item is a promotion.
   * This is `false` if the promotion has not been transferred or in all other cases.
   *
   * @get result
   * @var bool
   */
  public $is_transfer = false;

  /**
   * The key of the redemption code which is used to obtain some goods.
   * This should be specified only for items obtained via redemption code (not for ordinary purchases or for purchased
   * promotions without purchases). This value is `null` if it is not set.
   *
   * <tt>null</tt> if not set yet.
   *
   * @get get
   * @var string
   */
  public $k_code = null;

  /**
   * The key of the redemption code. This value will not be `0` if the purchased item is obtained via a redemption code
   * or if it is a component of a package which is obtained via a redemption code.
   *
   * @get result
   * @var string
   */
  public $k_code_result = '0';

  /**
   * The key of the currency used to make the purchase.
   *
   * @get result
   * @var string
   */
  public $k_currency = '';

  /**
   * The key of an entirely booked event.
   * This must be specified if the purchased item is a whole event and a component of a package.
   *
   * @get get
   * @var string|null
   */
  public $k_enrollment_book = null;

  /**
   * The key of a purchased product.
   * This must be specified if the purchased item is a product and a component of a package.
   *
   * @get get
   * @var string|null
   */
  public $k_login_product = null;

  /**
   * The key of the user's promotion.
   * This should only be specified for promotions given without a purchase. This is not for ordinary purchases or for
   * promotions obtained via redemption codes. This value is `null` if not set.
   *
   * <tt>null</tt> if not set yet.
   *
   * @get get
   * @var string|null
   */
  public $k_login_promotion = null;

  /**
   * The key of the purchased promotion. This value will not be `0` only for promotions.
   *
   * @get result
   * @var string
   */
  public $k_login_promotion_result = '0';

  /**
   * The key of the purchased item. This should be specified only for ordinary purchases, not for those obtained via
   * redemption codes or as a result of an old import.
   *
   * @get get
   * @var string|null
   */
  public $k_purchase_item = null;

  /**
   * The key of the whole purchase which includes the given purchased item.

   *
   * @get result
   * @var string
   */
  public $k_purchase_result = '0';

  /**
   * The key of the makeup session used to attend an event.
   *
   * @get get
   * @var string|null
   */
  public $k_session_pass = null;

  /**
   * The cost of the purchased item.
   *
   * @get result
   * @var string|null
   */
  public $m_cost_item = '';

  /**
   * The total cost of the purchase, includes taxes and fees.
   *
   * @get result
   * @var string
   */
  public $m_cost_total = '';

  /**
   * The amount of the discount given via a reward prize. This value will be empty if the discount was not applied.
   *
   * @get result
   * @var string
   */
  public $m_discount_amount = '';

  /**
   * The amount of the discount for the client type. This value will be empty if the discount was not applied.
   *
   * @get result
   * @var string
   */
  public $m_discount_login_type_amount = '';

  /**
   * The amount to pay for each payment period; this is used only for promotions with the program type “membership”.
   *
   * @get result
   * @var string
   */
  public $m_period_price = '';

  /**
   * The amount refunded. This will be `0` if there are no refunds.
   *
   * @get result
   * @var string
   */
  public $m_refund = '';

  /**
   * The redemption code. This value is used only if the purchase is bought via a redemption code.
   *
   * @get result
   * @var string
   */
  public $s_code = '';

  /**
   * Not empty only for gift cards. Code to redeem gift card.
   *
   * Can be auto-generated or custom (entered manually by the staff member during purchase).
   * Max length - 20 characters. Can include numbers and letters.
   *
   * @get result
   * @var string
   */
  public $s_gift_code = '';

  /**
   * Not empty only for gift cards. Name of gift recipient.
   *
   * @get result
   * @var string
   */
  public $s_gift_recipient = '';

  /**
   * The name of the staff member who disabled the usage of the purchased item.
   * This value will be empty if the purchased item is enabled.
   *
   * @get result
   * @var string
   */
  public $s_limit_actor = '';

  /**
   * The email address the gift card was sent to; this is used only for gift cards.
   *
   * @get result
   * @var string
   */
  public $s_mail = '';

  /**
   * The text of the message sent to the gift card recipient; this is used only for gift cards.
   * This will be empty if an email notification should not be sent.

   *
   * @get result
   * @var string
   */
  public $s_message = '';

  /**
   * The name of the user who paid for this purchase.
   *
   * @get result
   * @var string
   */
  public $s_payer = '';

  /**
   * The title of the converted promotion; this value is used only for promotions which must be converted to
   * another promotion after expiration.
   *
   * @get result
   * @var string
   */
  public $s_promotion_convert = '';

  /**
   * This is the purchase ID number as it appears on the receipt.
   * This value will also include the leading 0s for the ID number.
   *
   * @get result
   * @var string
   */
  public $s_purchase = '';

  /**
   * The name of the recipient; this value is used only for gift cards.
   *
   * @get result
   * @var string
   */
  public $s_recipient = '';

  /**
   * The name of the sender; this value is used only for gift cards.
   *
   * @get result
   * @var string
   */
  public $s_sender = '';

  /**
   * The name of the purchased item.
   *
   * @get result
   * @var string
   */
  public $s_title = '';

  /**
   * The string ID of the purchased item. This ID may be used to change the view of the purchased item.
   *
   * @get result
   * @var string
   */
  public $sid_value = '';

  /**
   * The key of the user who paid for this purchase.
   *
   * @get result
   * @var string
   */
  public $uid_payer = '';

  /**
   * The key of the recipient user. This will only differ for some types of purchased items like gift cards.
   *
   * @get result
   * @var string
   */
  public $uid_recipient = '';
}

?>