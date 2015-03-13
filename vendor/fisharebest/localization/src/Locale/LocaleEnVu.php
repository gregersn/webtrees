<?php namespace Fisharebest\Localization;

/**
 * Class LocaleEnVu
 *
 * @author        Greg Roach <fisharebest@gmail.com>
 * @copyright (c) 2015 Greg Roach
 * @license       GPLv3+
 */
class LocaleEnVu extends LocaleEn {
	/** {@inheritdoc} */
	public function territory() {
		return new TerritoryVu;
	}
}