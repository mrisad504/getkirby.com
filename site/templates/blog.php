<?php snippet('header') ?>

<main class="main articles" role="main">

  <h1 class="is-invisible">Blog</h1>

  <ul>

    <?php if(param('tag')) {   /*** article overview ***/

      $tag = urldecode(param('tag'));
      $articles = $pages->find('blog')->children()->visible()->filterBy('tags', $tag, ',')->flip()->paginate(20);

        echo '<h1 class="beta">Tag results: <mark>', $tag, '</mark></h1>';

      } else {

      $articles = $pages->find('blog')->children()->visible()->flip()->paginate(20);

    } ?>

    <?php foreach($articles as $article): ?>
    <li class="article-preview">
      <h2 class="alpha"><a href="<?php echo $article->url() ?>"><?php echo $article->title() ?></a></h2>
      <time class="article-date" datetime="<?php echo $page->date('c') ?>">
        <span class="month"><?php echo $article->date('M d') ?></span>
        <span class="year"><?php echo $article->date('Y') ?></span>
      </time>
    </li>
    <?php endforeach ?>

  </ul>

  <?php if($articles->pagination()->hasPages()): /*** pagination ***/ ?>
  <nav class="pagination cf">
    <?php if($articles->pagination()->hasPrevPage()): ?>
    <a class="prev" href="<?= $articles->pagination()->prevPageURL() ?>">&lsaquo;&lsaquo; newer posts</a>
    <?php endif ?>
    <?php if($articles->pagination()->hasNextPage()): ?>
    <a class="next" href="<?= $articles->pagination()->nextPageURL() ?>">older posts &rsaquo;&rsaquo;</a>
    <?php endif ?>
  </nav>
  <?php endif ?>

</main>


<?php snippet('footer') ?>