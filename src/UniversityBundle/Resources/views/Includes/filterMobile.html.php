<?php
/**
* @var \Pimcore\Templating\PhpEngine $this
* @var \Pimcore\Templating\PhpEngine $view
* @var \Pimcore\Templating\GlobalVariables $app
*/
?>

<div class="modal fade" id="search-filter" tabindex="-1" role="dialog" aria-labelledby="search-filter-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0 rounded">
            <nav class="nav border-bottom p-3 flex-row justify-content-between align-items-center sticky-top bg-white rounded-top">
                <div id="search-filter-label" class="d-flex justify-content-between">
                    <h3 class=" m-0">Filter</h3>
                </div>
                <a href="<?= $this->path; ?>" class="d-block">Reset filter</a>
                <button type="button" class="border-0 bg-transparent cursor-pointer lh-0 p-2 nm-2" data-dismiss="modal" aria-controls="mobileMenu" aria-expanded="false" aria-label="Hide menu"><span aria-hidden="true"><i class="fal fa-times fa-lg"></i></span></button>
            </nav>

            <div class="p-3">
                <form action="" id="uniFilterMobile" class="form"  method="GET">
                    <?php if ($_REQUEST['search']): ?>
                        <input type="hidden" name="search" value="<?= $_REQUEST['search']; ?>">
                    <?php endif ?>
                    <?php if ($_REQUEST['region']): ?>
                        <input type="hidden" name="region" value="<?= $_REQUEST['region']; ?>">
                    <?php endif ?>

                    <fieldset class="form-group">
                        <legend>Programme</legend>
                        <div class="form-group">
                            <label class="w-100">
                                <select form="uniFilterMobile" class="form-control custom-select" name="programme">
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
                    
                    <fieldset class="form-group">
                        <legend>Countries</legend>
                        <div class="form-group">
                            <label class="w-100">
                                <select form="uniFilterMobile" class="form-control custom-select" name="country">
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

                    <fieldset class="form-group">
                        <legend>Subject area</legend>
                        <div class="mb-2">
                            <div class="custom-control custom-radio">
                                <?php if (!$_REQUEST['subject']): ?>
                                    <input type="radio" class="custom-control-input" id="filter1-0-modal" name="subject" value="" checked>
                                <?php else: ?>
                                <input type="radio" class="custom-control-input" id="filter1-0-modal" name="subject" value="">
                                <?php endif ?>
                                <label class="custom-control-label" for="filter1-0-modal">All</label>
                            </div>
                        </div>

                        <?php foreach ($this->subjectOptions as $key => $s): ?>
                            <?php $sKey = $s['key']; ?>
                            <?php $sValue = $s['value']; ?>
                            <div class="mb-2">
                                <div class="custom-control custom-radio">
                                    <?php if ($_REQUEST['subject'] == $sValue): ?>
                                        <input type="radio" class="custom-control-input" id="<?= 'filter1' . '-' . ($key+1) . '-modal';?>" name="subject" value="<?= $sValue ?>" checked>
                                    <?php else: ?>
                                    <input type="radio" class="custom-control-input" id="<?= 'filter1' . '-' . ($key+1) . '-modal';?>" name="subject" value="<?= $sValue ?>">
                                    <?php endif ?>
                                    <label class="custom-control-label" for="<?= 'filter1' . '-' . ($key+1) . '-modal';?>"><?= $sKey; ?></label>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </fieldset>

                    <fieldset class="form-group">
                        <legend>Year</legend>
                        <div class="mb-2">
                            <div class="custom-control custom-radio">
                                <?php if (!$_REQUEST['year']): ?>
                                    <input type="radio" class="custom-control-input" id="filter4-0-modal" name="year" value="" checked>
                                <?php else: ?>
                                <input type="radio" class="custom-control-input" id="filter4-0-modal" name="year" value="">
                                <?php endif ?>
                                <label class="custom-control-label" for="filter4-0-modal">All</label>
                            </div>
                        </div>

                        <?php foreach ($this->yearOptions as $key => $y): ?>
                            <?php $yKey = $y['key']; ?>
                            <?php $yValue = $y['value']; ?>
                            <div class="mb-2">
                                <div class="custom-control custom-radio">
                                    <?php if ($_REQUEST['year'] == $yValue): ?>
                                        <input type="radio" class="custom-control-input" id="<?= 'filter4' . '-' . ($key+1) . '-modal';?>" name="year" value="<?= $yValue ?>" checked>
                                    <?php else: ?>
                                    <input type="radio" class="custom-control-input" id="<?= 'filter4' . '-' . ($key+1) . '-modal';?>" name="year" value="<?= $yValue ?>">
                                    <?php endif ?>
                                    <label class="custom-control-label" for="<?= 'filter4' . '-' . ($key+1) . '-modal';?>"><?= $yKey; ?></label>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </fieldset>

                    <fieldset class="form-group">
                        <legend>Period</legend>
                        <div class="mb-2">
                            <div class="custom-control custom-radio">
                                <?php if (!$_REQUEST['period']): ?>
                                    <input type="radio" class="custom-control-input" id="filter5-0-modal" name="period" value="" checked>
                                <?php else: ?>
                                <input type="radio" class="custom-control-input" id="filter5-0-modal" name="period" value="">
                                <?php endif ?>
                                <label class="custom-control-label" for="filter5-0-modal">All</label>
                            </div>
                        </div>

                        <?php foreach ($this->periodOptions as $key => $p): ?>
                            <?php $pKey = $p['key']; ?>
                            <?php $pValue = $p['value']; ?>
                            <div class="mb-2">
                                <div class="custom-control custom-radio">
                                    <?php if ($_REQUEST['period'] == $pValue): ?>
                                        <input type="radio" class="custom-control-input" id="<?= 'filter5' . '-' . ($key+1) . '-modal';?>" name="period" value="<?= $pValue ?>" checked>
                                    <?php else: ?>
                                    <input type="radio" class="custom-control-input" id="<?= 'filter5' . '-' . ($key+1) . '-modal';?>" name="period" value="<?= $pValue ?>">
                                    <?php endif ?>
                                    <label class="custom-control-label" for="<?= 'filter5' . '-' . ($key+1) . '-modal';?>"><?= $pKey; ?></label>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </fieldset>

                    <fieldset class="form-group">
                        <legend>Mobility Type</legend>
                        <div class="mb-2">
                            <div class="custom-control custom-radio">
                                <?php if (!$_REQUEST['mobilityType']): ?>
                                    <input type="radio" class="custom-control-input" id="filter6-0-modal" name="mobilityType" value="" checked>
                                <?php else: ?>
                                <input type="radio" class="custom-control-input" id="filter6-0-modal" name="mobilityType" value="">
                                <?php endif ?>
                                <label class="custom-control-label" for="filter6-0-modal">All</label>
                            </div>
                        </div>

                        <?php foreach ($this->mobilityTypeOptions as $key => $m): ?>
                            <?php $mKey = $m['key']; ?>
                            <?php $mValue = $m['value']; ?>
                            <div class="mb-2">
                                <div class="custom-control custom-radio">
                                    <?php if ($_REQUEST['mobilityType'] == $mValue): ?>
                                        <input type="radio" class="custom-control-input" id="<?= 'filter6' . '-' . ($key+1) . '-modal';?>" name="mobilityType" value="<?= $mValue ?>" checked>
                                    <?php else: ?>
                                    <input type="radio" class="custom-control-input" id="<?= 'filter6' . '-' . ($key+1) . '-modal';?>" name="mobilityType" value="<?= $mValue ?>">
                                    <?php endif ?>
                                    <label class="custom-control-label" for="<?= 'filter6' . '-' . ($key+1) . '-modal';?>"><?= $mKey; ?></label>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </fieldset>

                    <div class="mt-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Apply">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="d-lg-none text-center mb-5">
    <a class="btn btn-primary" href="#search-filter" data-toggle="modal" aria-controls="search-filter" aria-expanded="false" aria-label="Visa filter">Filter</a>
</div>
