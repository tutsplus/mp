<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\Meeting;
use common\models\User;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MeetingLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('frontend', 'Meeting Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<p>
    <?php // = Html::a(Yii::t('frontend', 'Create Meeting Log'), ['create'], ['class' => 'btn btn-success']) ?>
</p>



<?php Pjax::begin(); ?>
<div class="meeting-log-index">
    <h1><?php echo  Html::encode($this->title) ?></h1>

    <?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],
        [
          'label'=>'MtgId',
            'attribute' => 'meeting_id',
            'format' => 'raw',
            'value' => function ($model) {
                return '<div>'.$model->meeting_id.'</div>';
                },
        ],
        [
          'label'=>'Subject',
            'attribute' => 'subject',
            'format' => 'raw',
            'value' => function ($model) {
                return '<div>'.Meeting::getSubject($model->meeting_id).'</div>';
                },
        ],
        [
          'label'=>'Actor',
            'attribute' => 'actor_id',
            'format' => 'raw',
            'value' => function ($model) {
                    return '<div>'.User::find($model->actor_id)->one()->username.'</div>';
                },
        ],
        [
          'label'=>'Action',
            'attribute' => 'action',
            'format' => 'raw',
            'value' => function ($model) {
                  return '<div>'.$model->getMeetingLogCommand().'</div>';
                },
        ],
        [
          'label'=>'Item',
            'attribute' => 'item_id',
            'format' => 'raw',
            'value' => function ($model) {
                        return '<div>'.$model->getMeetingLogItem().'</div>';
                },
        ],
        // 'updated_at',
        // 'extra_id',
        //['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>

<?php Pjax::end(); ?></div>
