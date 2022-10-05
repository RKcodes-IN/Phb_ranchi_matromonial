<?php

namespace app\modules\admin\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\AgentDetails;

/**
 * app\modules\admin\models\search\AgentDetailsSearch represents the model behind the search form about `app\modules\admin\models\AgentDetails`.
 */
 class AgentDetailsSearch extends AgentDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'agent_id', 'no_of_bank_tied', 'team_members', 'document_verifcation', 'consulation_fee', 'customers_served_till', 'certified_dsa', 'avg_processing_day', 'doorstep_service', 'loan_offer', 'establishment_year', 'quick_solution', 'status', 'create_user_id', 'update_user_id'], 'integer'],
            [['partner_type', 'roi', 'commission_form', 'created_on', 'updated_on'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AgentDetails::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_on' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'agent_id' => $this->agent_id,
            'no_of_bank_tied' => $this->no_of_bank_tied,
            'team_members' => $this->team_members,
            'document_verifcation' => $this->document_verifcation,
            'consulation_fee' => $this->consulation_fee,
            'customers_served_till' => $this->customers_served_till,
            'certified_dsa' => $this->certified_dsa,
            'avg_processing_day' => $this->avg_processing_day,
            'doorstep_service' => $this->doorstep_service,
            'loan_offer' => $this->loan_offer,
            'establishment_year' => $this->establishment_year,
            'quick_solution' => $this->quick_solution,
            'status' => $this->status,
            'create_user_id' => $this->create_user_id,
            'update_user_id' => $this->update_user_id,
        ]);

        $query->andFilterWhere(['like', 'partner_type', $this->partner_type])
            ->andFilterWhere(['like', 'roi', $this->roi])
            ->andFilterWhere(['like', 'commission_form', $this->commission_form])
            ->andFilterWhere(['like', 'created_on', $this->created_on])
            ->andFilterWhere(['like', 'updated_on', $this->updated_on]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with managersearch query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function managersearch($params)
    {
        $query = AgentDetails::find()
                     ->where(['city_id' => \Yii::$app->user->identity->city_id])
        ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_on' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'agent_id' => $this->agent_id,
            'no_of_bank_tied' => $this->no_of_bank_tied,
            'team_members' => $this->team_members,
            'document_verifcation' => $this->document_verifcation,
            'consulation_fee' => $this->consulation_fee,
            'customers_served_till' => $this->customers_served_till,
            'certified_dsa' => $this->certified_dsa,
            'avg_processing_day' => $this->avg_processing_day,
            'doorstep_service' => $this->doorstep_service,
            'loan_offer' => $this->loan_offer,
            'establishment_year' => $this->establishment_year,
            'quick_solution' => $this->quick_solution,
            'status' => $this->status,
            'create_user_id' => $this->create_user_id,
            'update_user_id' => $this->update_user_id,
        ]);

        $query->andFilterWhere(['like', 'partner_type', $this->partner_type])
            ->andFilterWhere(['like', 'roi', $this->roi])
            ->andFilterWhere(['like', 'commission_form', $this->commission_form])
            ->andFilterWhere(['like', 'created_on', $this->created_on])
            ->andFilterWhere(['like', 'updated_on', $this->updated_on]);

        if(isset ($this->created_on)&&$this->created_on!=''){ 
           
           //you dont need the if function if yourse sure you have a not null date
            $date_explode=explode(" - ",$this->created_on);
         //   var_dump($date_explode);exit;
            $date1=trim($date_explode[0]);
           $date2=trim($date_explode[1]);
           $query->andFilterWhere(['between','created_on',$date1,$date2]);
          // var_dump($query->createCommand()->getRawSql());exit;
          }
       if(isset ($this->updated_on)&&$this->updated_on!=''){ 
      
           //you dont need the if function if yourse sure you have a not null date
            $date_explode=explode(" - ",$this->updated_on);
         //   var_dump($date_explode);exit;
            $date1=trim($date_explode[0]);
           $date2=trim($date_explode[1]);
           $query->andFilterWhere(['between','updated_on',$date1,$date2]);
          //  var_dump($query->createCommand()->getRawSql());exit;
          }

        return $dataProvider;
    }
}
