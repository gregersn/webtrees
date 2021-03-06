<?php use Fisharebest\Webtrees\Date; ?>
<?php use Fisharebest\Webtrees\I18N; ?>

<script>
  function selectCensus(el) {
    var option = $(":selected", el);

    $("input[id^=DATE]", $(el).closest("form")).val(option.val());
    $("input[id^=PLAC]", $(el).closest("form")).val(option.data("place"));
    $("input.census-class", $(el).closest("form")).val(option.data("census"));
  }
</script>

<select id="census-selector" class="form-control" onchange="selectCensus(this)">
	<option value=""><?= I18N::translate('Census date') ?></option>

	<?php foreach ($census_places as $census_place): ?>
		<option value=""></option>
		<?php foreach ($census_place->allCensusDates() as $census): ?>
			<option value="<?= $census->censusDate() ?>" data-place="<?= $census->censusPlace() ?>" data-census="<?= get_class($census) ?>">
				<?= (explode(', ', $census->censusPlace()))[0] ?>
				<?= (new Date($census->censusDate()))->minimumDate()->format('%Y') ?>
			</option>
		<?php endforeach ?>
	<?php endforeach ?>
</select>
