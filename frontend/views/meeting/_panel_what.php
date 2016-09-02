<?php
use yii\helpers\Html;
use yii\bootstrap\Collapse;
use frontend\models\Meeting;
?>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading" role="tab" id="headingWhat">
    <div class="row">
      <div class="col-lg-10 col-md-10 col-xs-10"><h4 class="meeting-view"><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseWhat" aria-expanded="true" aria-controls="collapseWhat">What</a></h4>
        <?php
          if ($model->status >= Meeting::STATUS_CONFIRMED) {
            $hint = Yii::t('frontend','the subject for your meeting');
          } else {
            $hint = Yii::t('frontend','edit the subject for your meeting');
          }
        ?>
        <span class="hint-text"><?= $hint; ?></span>
      </div>
      <div class="col-lg-2 col-md-2 col-xs-2" ><div style="float:right;">
      <?php
        if ($model->isOrganizer() && $model->status <= Meeting::STATUS_CONFIRMED) {
            echo Html::a('', ['update', 'id' => $model->id], ['class' => 'btn btn-primary glyphicon glyphicon-pencil','title'=>'Edit']);
          }
        ?>
      </div>
    </div>
    </div>
  </div>
  <?php
    if ($model->has_subject || $model->subject == \frontend\models\Meeting::DEFAULT_SUBJECT) {
      ?>
      <div id="collapseWhat" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingWhat">
        <div class="panel-body">
        <?php if (empty($model->message)) {
          echo Html::encode($this->title);
          // note: required because couldn't prevent extra space
        } else {
          echo Html::encode($this->title).': '.Html::encode($model->message).'&nbsp;';
        } ?>
        </div>
      </div>
      <?php
    } else {
      ?>
      <?php
        }
        ?>
</div>
