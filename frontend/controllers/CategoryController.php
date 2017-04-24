<?php
	namespace frontend\controllers;
	use yii\web\Controller;
	use yii\helpers\Url;
	use backend\modules\posts\models\Posts;
	use common\models\Slug;

	/**
	* tin tuc
	*/
	class CategoryController extends Controller
	{
		
		public function actionIndex()
		{
			return $this->render('index');
		}
		public function actionPost($slug){
			$slug_all = Slug::findone(['value'=>$slug]);
			$post = Posts::findone(['id' => $slug_all->table_id  ]);
			$List_Tintuc   = $this->getPostLimitByCategory(5,5);
			return $this->render('post',[
				'post' => $post,
				'List_Tintuc' => $List_Tintuc
			]);
		}
		public function getPostLimitByCategory($category_id,$limit = '-1',$offset = 0)
	    {
	        $query = Posts::find()
	        ->where(['type'=>'post'])
	        ->orderBy(['id'=>SORT_DESC])
	        ->innerJoin('post_relationships','post_relationships.post_id = id')
	        ->where([
	                'post_relationships.post_table' => 'posts',
	                'post_relationships.table_id'   => $category_id,
	                'post_relationships.table_name' => 'category'
	            ])
	        ->offset($offset)
	        ->limit($limit)
	        ->all();
	        return $query;
	    }
	}