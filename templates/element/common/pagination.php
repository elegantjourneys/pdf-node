<?php
  $this->Paginator->setTemplates([
    'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'current' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
    'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>'
  ]);
?>
<div class="text-center">
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?= $this->Paginator->first('First') ?>
      <?= $this->Paginator->prev('Previous') ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next('Next') ?>
      <?= $this->Paginator->last('Last') ?>
    </ul>
  </nav>
  <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>