<?php
/**
* @var \Pimcore\Templating\PhpEngine $this
* @var \Pimcore\Templating\PhpEngine $view
* @var \Pimcore\Templating\GlobalVariables $app
*/

$path = $this->document->getFullPath();
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-4 col-xl-4 mb-4">
            <!-- RightBlock Filter - Desktop -->
            <div class="bg-plaster-25 p-3 p-xl-5 d-none d-lg-block">
                <?= $this->template('UniversityBundle:Includes:filterDesktop.html.php',[
                    'path' => $path
                ]); ?>
            </div>
        </div>

        <div class="col-12 col-lg-8 col-xl-8">
            <?php if ($this->editmode): ?>
                <span>Number of Universities per page:</span>
                <?= $this->numeric("numberOfUniversities"); ?>

                <span>SAAS Link:</span>
                <?= $this->input("saasLink"); ?>

                <!-- Page title -->
                <div class="mt-3">
                    <span>Page Title:</span>
                    <h1 class=""><?= $this->input("heading"); ?></h1>
                </div>
            <?php endif ?>

            <!-- Page title -->
            <div class="row">
                <?php if (!$this->editmode && !$this->input("heading")->isEmpty()) : ?>
                    <h1 class="col-12"><?= $this->input("heading")->getData(); ?></h1>
                <?php endif; ?>
            </div>

            <!-- Search filter -->
            <div class="row">
                <div class="col-12">
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="GET">
                        <div class="form-group">
                              <label class="w-100">
                                Find university
                                <div class="input-group rounded-0">
                                    <input type="text" class="form-control" name="search" value="<?= $_REQUEST['search']; ?>">
                                    <?php if ($_REQUEST['region']): ?>
                                      <input type="hidden" name="region" value="<?= $_REQUEST['region']; ?>">
                                    <?php endif ?>
                                    <?php if ($_REQUEST['subject']): ?>
                                      <input type="hidden" name="subject" value="<?= $_REQUEST['subject']; ?>">
                                    <?php endif ?>
                                    <?php if ($_REQUEST['year']): ?>
                                      <input type="hidden" name="year" value="<?= $_REQUEST['year']; ?>">
                                    <?php endif ?>
                                    <?php if ($_REQUEST['period']): ?>
                                      <input type="hidden" name="period" value="<?= $_REQUEST['period']; ?>">
                                    <?php endif ?>
                                    <?php if ($_REQUEST['mobilityType']): ?>
                                      <input type="hidden" name="mobilityType" value="<?= $_REQUEST['mobilityType']; ?>">
                                    <?php endif ?>
                                    <?php if ($_REQUEST['country']): ?>
                                      <input type="hidden" name="country" value="<?= $_REQUEST['country']; ?>">
                                    <?php endif ?>
                                    <?php if ($_REQUEST['programme']): ?>
                                      <input type="hidden" name="programme" value="<?= $_REQUEST['programme']; ?>">
                                    <?php endif ?>
                                    <div class="input-group-append">
                                      <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Region filter -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <?php $reqPath = http_build_query(array_replace(array_diff_key($_REQUEST, ['page'=>'', 'region' => '']))); ?>
                            <a class="nav-link <?= $this->regionActiveClass['all']; ?>" href="<?= $path.'?'.$reqPath; ?>"><?= 'All (' .  (($this->countUni) ? $this->countUni : 0) . ')'; ?></a>
                        </li>
                        <?php foreach ($this->regionsOptions as $reg): ?>
                            <?php $regKey = $reg['key']; ?>
                            <?php $regValue = $reg['value']; ?>
                            <?php $reqPath = ($_REQUEST['region']) ?
                                http_build_query(array_replace(array_diff_key($_REQUEST, ['page'=>'']), ['region' => $regValue])) :
                                http_build_query(array_diff_key($_REQUEST, ['page'=>''])) . "&region=$regValue";
                            ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->regionActiveClass[$regValue]; ?>" target="_self" href="<?= $path.'?'.$reqPath; ?>"><?= $regKey . ' (' . (($this->countUniRegion[$regValue]) ?: 0) . ')'; ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>

            <!-- RightBlock Filter - Mobile -->
            <div class="row">
                <div class="col-12">
                    <?= $this->template('UniversityBundle:Includes:filterMobile.html.php',[
                        'path' => $path
                    ]); ?>
                </div>
            </div>

            <!-- Partner Universities list -->
            <div class="row">
                <div class="col-12 mt-3 mt-xl-6">
                    <?= $this->template('UniversityBundle:Includes:universities.html.php',[
                        'path' => $path
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
