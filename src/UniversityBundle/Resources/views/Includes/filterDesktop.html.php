<?php
/**
* @var \Pimcore\Templating\PhpEngine $this
* @var \Pimcore\Templating\PhpEngine $view
* @var \Pimcore\Templating\GlobalVariables $app
*/
?>

<script>
    function setHref(path, key) {
        var id = key + 'Select';
        var value = document.getElementById(id).value;
        var href = path + '&' + key + '=' + value;
        return href;
    }
</script>

<div class="row mb-3">
    <div class="col">
        <h4 class="mt-0">Filter</h4>
    </div>
    <div class="col text-right">
        <a href="<?= $this->path; ?>">Reset filter</a>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-2">
        <fieldset>
            <legend>Programme</legend>
            <div class="form-group">
                <label class="w-100">
                    <?php $reqPath = http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'programme'=>''])); ?>
                    <select class="form-control custom-select" id="programmeSelect" name="programmeSelect" onchange="location.href=setHref('<?= $this->path . '?' . $reqPath; ?>', 'programme')">
                        <option value="">Select programme</option>
                        <?php foreach ($programmeOptions as $p): ?>
                            <?php $pKey = $p['key']; ?>
                            <?php $pValue = $p['value']; ?>
                            <?php if ($_REQUEST['programme'] == $pValue): ?>
                                <option value="<?= $pValue ?>" selected><?= $pKey; ?></option>
                            <?php else: ?>
                                <option value="<?= $pValue ?>"><?= $pKey; ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-12 mb-2">
        <fieldset>
            <legend>Country</legend>
            <div class="form-group">
                <label class="w-100">
                    <?php $reqPath = http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'country'=>''])); ?>
                    <select class="form-control custom-select" id="countrySelect" name="countrySelect" onchange="location.href=setHref('<?= $this->path . '?' . $reqPath; ?>', 'country')">
                        <option value="">Select country</option>
                        <?php foreach ($countryOptions as $c): ?>
                            <?php $cKey = $c['key']; ?>
                            <?php $cValue = $c['value']; ?>
                            <?php if ($_REQUEST['country'] == $cValue): ?>
                                <option value="<?= $cValue; ?>" selected><?= $cKey; ?></option>
                            <?php else: ?>
                                <option value="<?= $cValue; ?>"><?= $cKey; ?></option>
                            <?php endif ?>
                        <?php endforeach ?>
                    </select>
                </label>
            </div>
        </fieldset>
    </div>

    <div class="col-12 mb-4">
        <fieldset>
            <legend>Subject area</legend>
            <div class=" mb-2">
                <div class="custom-control custom-radio">
                    <?php $reqPath = ($_REQUEST['subject']) ?
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'subject'=>''])) :
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'']));
                    ?>
                    <?php if (!$_REQUEST['subject']): ?>
                        <input type="radio" class="custom-control-input" id="filter1-0" name="filter1-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                    <?php else: ?>
                    <input type="radio" class="custom-control-input" id="filter1-0" name="filter1-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                    <?php endif ?>
                    <label class="custom-control-label" for="filter1-0">All</label>
                </div>
            </div>

            <?php foreach ($this->subjectOptions as $key => $s): ?>
                <?php $sKey = $s['key']; ?>
                <?php $sValue = $s['value']; ?>
                <div class=" mb-2">
                    <div class="custom-control custom-radio">
                        <?php $reqPath = ($_REQUEST['subject'] == $sValue) ?
                            http_build_query(array_diff_key($_REQUEST, ['page'=>''])) :
                            http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'subject'=>''])) . "&subject=$sValue";
                        ?>
                        <?php if ($_REQUEST['subject'] == $sValue): ?>
                            <input type="radio" class="custom-control-input" id="<?= 'filter1' . '-' . ($key+1);?>" name="<?= 'filter1' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                        <?php else: ?>
                        <input type="radio" class="custom-control-input" id="<?= 'filter1' . '-' . ($key+1);?>" name="<?= 'filter1' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                        <?php endif ?>
                        <label class="custom-control-label" for="<?= 'filter1' . '-' . ($key+1);?>"><?= $sKey; ?></label>
                    </div>
                </div>
            <?php endforeach ?>
        </fieldset>
    </div>

    <div class="col-12 mb-4">
        <fieldset>
            <legend>Year</legend>
            <div class=" mb-2">
                <div class="custom-control custom-radio">
                    <?php $reqPath = ($_REQUEST['year']) ?
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'year'=>''])) :
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'']));
                    ?>
                    <?php if (!$_REQUEST['year']): ?>
                        <input type="radio" class="custom-control-input" id="filter4-0" name="filter4-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                    <?php else: ?>
                    <input type="radio" class="custom-control-input" id="filter4-0" name="filter4-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                    <?php endif ?>
                    <label class="custom-control-label" for="filter4-0">All</label>
                </div>
            </div>

            <?php foreach ($this->yearOptions as $key => $y): ?>
                <?php $yKey = $y['key']; ?>
                <?php $yValue = $y['value']; ?>
                <div class=" mb-2">
                    <div class="custom-control custom-radio">
                        <?php $reqPath = ($_REQUEST['year'] == $yValue) ?
                            http_build_query(array_diff_key($_REQUEST, ['page'=>''])) :
                            http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'year'=>''])) . "&year=$yValue";
                        ?>
                        <?php if ($_REQUEST['year'] == $yValue): ?>
                            <input type="radio" class="custom-control-input" id="<?= 'filter4' . '-' . ($key+1);?>" name="<?= 'filter4' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                        <?php else: ?>
                        <input type="radio" class="custom-control-input" id="<?= 'filter4' . '-' . ($key+1);?>" name="<?= 'filter4' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                        <?php endif ?>
                        <label class="custom-control-label" for="<?= 'filter4' . '-' . ($key+1);?>"><?= $yKey; ?></label>
                    </div>
                </div>
            <?php endforeach ?>
        </fieldset>
    </div>

    <div class="col-12 mb-4">
        <fieldset>
            <legend>Period</legend>
            <div class=" mb-2">
                <div class="custom-control custom-radio">
                    <?php $reqPath = ($_REQUEST['period']) ?
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'period'=>''])) :
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'']));
                    ?>
                    <?php if (!$_REQUEST['period']): ?>
                        <input type="radio" class="custom-control-input" id="filter5-0" name="filter5-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                    <?php else: ?>
                    <input type="radio" class="custom-control-input" id="filter5-0" name="filter5-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                    <?php endif ?>
                    <label class="custom-control-label" for="filter5-0">All</label>
                </div>
            </div>

            <?php foreach ($this->periodOptions as $key => $p): ?>
                <?php $pKey = $p['key']; ?>
                <?php $pValue = $p['value']; ?>
                <div class=" mb-2">
                    <div class="custom-control custom-radio">
                        <?php $reqPath = ($_REQUEST['period'] == $pValue) ?
                            http_build_query(array_diff_key($_REQUEST, ['page'=>''])) :
                            http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'period'=>''])) . "&period=$pValue";
                        ?>
                        <?php if ($_REQUEST['period'] == $pValue): ?>
                            <input type="radio" class="custom-control-input" id="<?= 'filter5' . '-' . ($key+1);?>" name="<?= 'filter5' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                        <?php else: ?>
                        <input type="radio" class="custom-control-input" id="<?= 'filter5' . '-' . ($key+1);?>" name="<?= 'filter5' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                        <?php endif ?>
                        <label class="custom-control-label" for="<?= 'filter5' . '-' . ($key+1);?>"><?= $pKey; ?></label>
                    </div>
                </div>
            <?php endforeach ?>
        </fieldset>
    </div>

    <div class="col-12 mb-0">
        <fieldset>
            <legend>Mobility type</legend>
            <div class=" mb-2">
                <div class="custom-control custom-radio">
                    <?php $reqPath = ($_REQUEST['mobilityType']) ?
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'mobilityType'=>''])) :
                        http_build_query(array_diff_key($_REQUEST, ['page'=>'']));
                    ?>
                    <?php if (!$_REQUEST['mobilityType']): ?>
                        <input type="radio" class="custom-control-input" id="filter6-0" name="filter6-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                    <?php else: ?>
                    <input type="radio" class="custom-control-input" id="filter6-0" name="filter6-0" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                    <?php endif ?>
                    <label class="custom-control-label" for="filter6-0">All</label>
                </div>
            </div>

            <?php foreach ($this->mobilityTypeOptions as $key => $m): ?>
                <?php $mKey = $m['key']; ?>
                <?php $mValue = $m['value']; ?>
                <div class=" mb-2">
                    <div class="custom-control custom-radio">
                        <?php $reqPath = ($_REQUEST['mobilityType'] == $mValue) ?
                            http_build_query(array_diff_key($_REQUEST, ['page'=>''])) :
                            http_build_query(array_diff_key($_REQUEST, ['page'=>'', 'mobilityType'=>''])) . "&mobilityType=$mValue";
                        ?>
                        <?php if ($_REQUEST['mobilityType'] == $mValue): ?>
                            <input type="radio" class="custom-control-input" id="<?= 'filter6' . '-' . ($key+1);?>" name="<?= 'filter6' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';" checked>
                        <?php else: ?>
                        <input type="radio" class="custom-control-input" id="<?= 'filter6' . '-' . ($key+1);?>" name="<?= 'filter6' . '-' . ($key+1);?>" onclick="location.href='<?= $this->path.'?'.$reqPath; ?>';">
                        <?php endif ?>
                        <label class="custom-control-label" for="<?= 'filter6' . '-' . ($key+1);?>"><?= $mKey; ?></label>
                    </div>
                </div>
            <?php endforeach ?>
        </fieldset>
    </div>
</div>
