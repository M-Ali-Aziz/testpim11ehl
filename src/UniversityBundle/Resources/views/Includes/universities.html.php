<?php
/**
* @var \Pimcore\Templating\PhpEngine $this
* @var \Pimcore\Templating\PhpEngine $view
* @var \Pimcore\Templating\GlobalVariables $app
*/
?>

<div class="search-result">
    <?php if ($this->paginatorUniversities): ?>
        <!-- Universities -->
        <?php $countryArr = []; ?>
        <?php foreach ($this->paginator as $key => $university): ?>
            <?php $country = $university->getCountry(); ?>
            <?php if (!in_array($country, $countryArr) && $key == '0'): ?>
                <section>
                    <h2 class="m-0 py-2 border-bottom"><?= $country ?></h2>
                    <article class="pt-3">
                        <p><a href="<?= $this->saasLink . $university->getSoleMoveId(); ?>"><?= $university->getUniversity(); ?></a></p>
                    </article>
                    <?php $countryArr[] = $university->getCountry(); ?>
            <?php elseif (!in_array($country, $countryArr) && $key > '0'): ?>
                </section>
                <section>
                    <h2 class="m-0 mt-4 py-2 border-bottom"><?= $country ?></h2>
                    <article class="pt-3">
                        <p><a href="<?= $this->saasLink . $university->getSoleMoveId(); ?>"><?= $university->getUniversity(); ?></a></p>
                    </article>
                    <?php $countryArr[] = $university->getCountry(); ?>
            <?php else: ?>
                <article class="pt-3">
                    <p><a href="<?= $this->saasLink . $university->getSoleMoveId(); ?>"><?= $university->getUniversity(); ?></a></p>
                </article>
            <?php endif ?>
        <?php endforeach ?>
        </section>

        <div class="mt-4 mb-8 border-bottom"> </div>

        <!-- Pagination -->
        <?php $paginationViewPath =
            (($this->document->getProperty("bootstrap")) ? 'Bootstrap/Navigation/pagination.html.php' : 'Navigation/pagination.html.php');
        ?>

        <?php
        $urlprefix = ($_REQUEST['page']) ?
            $this->path.'?'.http_build_query(array_diff_key($_REQUEST, ['page'=>''])).'&page=' :
            $this->path.'?'.http_build_query($_REQUEST).'&page=' ;
        ;

        try {
            echo $this->render(
                "$paginationViewPath",
                array(
                    'paginatorPages' => $this->paginator->getPages("Sliding"),
                    'urlprefix' => $urlprefix,
                    'appendQueryString' => true
                )
            );
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
        ?>
    <?php else: ?>
        <h2 class="m-0 py-2">No university was found!</h2>
    <?php endif ?>
</div>
